<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\BackendController;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Backend\AttachmentsStoreRequest;

class AttachmentsController extends BackendController
{
    public function construct(){

    }

    public function store(AttachmentsStoreRequest $request){

    }

    public function destroy($attachment_id){

    }

    public function getArticles(Request $request, $page){

        $attachments = collect($this->getAllAttachment(5))->forPage($page,5);

        if($request->ajax()){
            return $attachments->toJson();
        }
        
    }
}
