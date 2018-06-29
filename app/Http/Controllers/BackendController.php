<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class BackendController extends Controller
{
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
}
