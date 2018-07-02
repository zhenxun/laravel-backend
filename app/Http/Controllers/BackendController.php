<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Config;
use App\Models\Administrator;

class BackendController extends Controller
{
    protected $admin;

    public function __construct(Administrator $admin){
        $this->admin = $admin;
    }

    public function getAllAttachment($per_page = 5){
        $directory = 'public/attachments';
        $files_path = Storage::allFiles($directory);

        foreach($files_path as $file){
            $data[] = array(
                'path' => $file,
                'filename' => File::name($file),
                'truncate_filename' => str_limit(File::name($file), 15),
                'extension' => File::extension($file),
                'size' => number_format(Storage::size($file) * 0.001, 2),
                'mime' => Storage::mimeType($file),
                'url' => Storage::url($file),
                'total' => count($files_path),
                'total_page' => ceil(count($files_path)/$per_page),
                'time' => Storage::lastModified($file)
            );
        }

        return $data;
    }

    public function candoit($method, $class){

        $can = $this->admin->can($method, $class);
        if(!$can){
            return abort(403, 'Unauthorized action.');
        }
    }

    public function getHeaderTitle(){
        $route_name = Route::currentRouteName();
        $split_route_name = explode('.', $route_name);

        return Config::set('global.title', $split_route_name[1]);
    }

    public function getHeaderMethod(){
        $route_name = Route::currentRouteName();
        $split_route_name = explode('.', $route_name);

        if(isset($split_route_name[2])){
            $method = $split_route_name[2];
        }else{
            $method = 'index';
        }

        return Config::set('global.method', $method);
    }

}
