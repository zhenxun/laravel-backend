<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\BackendController;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\Backend\AttachmentsStoreRequest;

class AttachmentsController extends BackendController
{
    const PATH = 'public/attachments';

    public function construct(){

    }

    public function store(Request $request){

    	$validator = Validator::make($request->all(), [
            'file' => 'required|mimes:jpg,jpeg,png,bmp,doc,docx,xls,xlsx,ptt,pttx,pdf|max:20000',
        ],[
            'file.required' => '附件不能空白!',
            'file.mimes' => '文件僅接受以下格式檔案 jpg,jpeg,png,bmp,doc,docx,xls,xlsx,ptt,pttx,pdf',
            'file.max' => '文件大小必須小於20MB'
        ]);

        if($validator->passes())
        {
            
        }

        return response()->json(['errors'=>$validator->errors()->all()]);

    }

    public function destroy($attachment_id){

    }

    public function getArticles(Request $request, $page){

        $attachments = collect($this->getAllAttachment(6))->forPage($page,6);

        if($request->ajax()){
            return $attachments->toJson();
        }
        
    }
}
