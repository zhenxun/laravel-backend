<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\BackendController;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Redirect;



class MembersController extends BackendController
{
    public function __construct(){

    }

    public function index(){
        return view('backend.members.index');
    }

    public function create(){
        $route = URL::route('admin.members.create');
        return view('backend.members.create', compact('route'));
    }

    public function edit($id){
        $route = URL::route('admin.members.update', $id);
        return view('backend.members.edit', compact('route'));
    }  

    public function store(){

    }

    public function importCsv(){

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

}
