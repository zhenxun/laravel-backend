<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\BackendController;
use Carbon\Carbon;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Models\Members;
use App\Http\Requests\Backend\CsvStoreRequest;
use App\Http\Requests\Backend\MembersStoreRequest;

class MembersController extends BackendController
{
    const csv_path='public/csv';
    protected $members;

    public function __construct(Members $members){
        $this->members = $members;
        $title = $this->getHeaderTitle();
        $method = $this->getHeaderMethod();
    }

    public function index(){
        $members = $this->members->orderBy('joining_date', 'desc')->get();
        return view('backend.members.index', compact('members'));
    }

    public function create(){
        $route = URL::route('admin.members.store');
        $csv_import_url = URL::route('admin.members.csv.import');
        return view('backend.members.create', compact('route', 'csv_import_url'));
    }

    public function edit($id){
        $route = URL::route('admin.members.update', $id);
        return view('backend.members.edit', compact('route'));
    }  

    public function store(MembersStoreRequest $request){

        $member_code = array('member_code' => $this->yieldMemberCode());
        
        $consent = ($request->has('consent'))? true:false;
        $recive_adv = ($request->has('recive_adv'))? true:false;

        $replacement_consent = array('consent' => $consent);
        $replacement_recive_adv = array('recive_adv' => $recive_adv);

        $basket = array_replace($request->except('_token'), $replacement_consent);
        $basket = array_replace($basket, $replacement_recive_adv);
        $basket = $basket +  $member_code;

        $store = $this->members->firstOrCreate($basket);

        if($store){
            return Redirect::route('admin.members.index')->with('success', trans('messages.success'));
        }else{
            return Redirect::route('admin.members.index')->with('success', trans('messages.failed'));
        }

    }

    public function importCsv(CsvStoreRequest $request){
        
        $csv = $this->store_file($request->file('csv'), SELF::csv_path);

        $filename = File::name($csv).'.'. File::extension($csv);
        $path = public_path('storage/csv/'. $filename);

        $csv_array = $this->csvToArray($path);

        for ($i=0; $i < count($csv_array) ; $i++) { 
            
            $consent = ($csv_array[$i]['consent'] == "Y")? true:false;
            if($csv_array[$i]['gender'] == 'F'){
                $gender = 'female';
            }elseif($csv_array[$i]['gender'] == 'M'){
                $gender = 'male';
            }else{
                $gender = 'other';
            }
            $recive_adv = ($csv_array[$i]['consent'] == "Y")? true:false;
            $joining_date = Carbon::parse($csv_array[$i]['joining_date'])->format('Y-m-d');

            $replacement_consent = array('consent' => $consent);
            $replacement_gender = array('gender' => $gender);
            $replacement_recive_adv = array('recive_adv' => $recive_adv);
            $replacement_joining_date = array('joining_date' => $joining_date);
            
            $basket = array_replace($csv_array[$i], $replacement_consent);
            $basket = array_replace($basket, $replacement_gender);
            $basket = array_replace($basket, $replacement_recive_adv);
            $basket = array_replace($basket, $replacement_joining_date); 

            $save = $this->members->firstOrCreate($basket);
        }

        if($save){
            return Redirect::route('admin.members.index')->with('success', trans('messages.success'));
        }else{
            return Redirect::route('admin.members.index')->with('success', trans('messages.failed'));
        }
        
    }

    public function update(){

    }

    public function destroy(){

    }

    private function csvToArray($filename = '', $delimiter = ','){

        if (!file_exists($filename) || !is_readable($filename))
        return false;

        $header = null;
        $data = array();
        if (($handle = fopen($filename, 'r')) !== false)
        {
            while (($row = fgetcsv($handle, 1000, $delimiter)) !== false)
            {
                if (!$header)
                    $header = $row;
                else
                    $data[] = array_combine($header, $row);
            }
            fclose($handle);
        }

        return $data;
    }

    private function yieldMemberCode(){

        $num_of_member = $this->members->count() + 1;

        $code = 'HNC'. str_pad($num_of_member, 5, '0', STR_PAD_LEFT);

        return $code;

    }

}
