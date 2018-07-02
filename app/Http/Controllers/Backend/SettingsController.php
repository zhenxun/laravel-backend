<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\BackendController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Config;
use App\Models\Setting;
use App\Http\Requests\Backend\SettingUpdateRequest;


class SettingsController extends BackendController
{
    protected $settings;

    public function __construct(Setting $settings){
        $this->settings = $settings;
        $title = $this->getHeaderTitle();
        $method = $this->getHeaderMethod();
    }

    public function index(){
        return Redirect::route('admin.settings.edit', 'setting');
    }

    public function edit(){
        $route = URL::route('admin.settings.update', 'setting');
        $settings = $this->settings->all();
        return view('backend.settings.edit', compact('route', 'settings'));
    }

    public function update(SettingUpdateRequest $request){

        for ($i=0; $i < count($request->input('id')); $i++) { 
            # code...
            $setting = $this->settings->where('id', $request->input('id')[$i])->first();

            if($setting->config_method == 'config')
            {
                $this->setConfig($setting->config_name, $request->input('value')[$i]);
            }

            if($setting->config_method == 'session'){
                $this->setSession($setting->config_name, $request->input('value')[$i]);

                if($setting->item == 'locale'){
                    App::setLocale($request->input('value')[$i]);
                }
            }

            $update = $this->settings->where('id', $request->input('id')[$i])->update([
                'value' => $request->input('value')[$i],
            ]);

        }

        if($update){
            return Redirect::route('admin.settings.edit', 'setting')->with('success', trans('messages.success'));
        }else{
            return Redirect::route('admin.settings.edit', 'setting')->with('failed', trans('messages.failed'));
        }

    }

    private function setConfig($key, $value){
        return  Config::set($key, $value);
    }

    private function setSession($key, $value){
        return Session::put($key, $value);
    }
}
