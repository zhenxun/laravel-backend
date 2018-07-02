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
            $save_attachments = $this->store_photo($request->file('file'));

            if($save_attachments){
                return response()->json(['success' => '上傳成功', 'errors' => [], 'failed' => []]);
            }else{
                return response()->json(['failed' => '上傳失敗', 'success' => [], 'errors' => []]);
            }

        }

        return response()->json(['errors'=>$validator->errors()->all(),'failed' => [], 'success' => [] ]);

    }

    public function destroy($filename){

        $real_path = storage_path('app/public/attachments/'. $filename);
        $path = 'public/attachments/'. $filename;

        if(file_exists($real_path)){
            $destroy_attachment = Storage::delete($path);
        }else{
            $destroy_attachment = false;
            $path = 'file no found';
        }

        

        if($destroy_attachment)
        {
            return response()->json(['success' => '檔案刪除成功', 'error' => []]);
        }else{
            return response()->json(['success' => [], 'error' => $path]);
        }

    }

    public function getArticles(Request $request, $page){

        $attachments = collect($this->getAllAttachment(6))->sortByDesc('time')->forPage($page,6);

        if($request->ajax()){
            return $attachments->toJson();
        }
        
    }

    private function store_photo($file){

        $upload = $file->store(self::PATH);
        $status = ($upload)? true:false;
        return $status;
    }
}
