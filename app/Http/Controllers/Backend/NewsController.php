<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\BackendController;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Redirect;
use App\Models\News;
use App\Http\Requests\Backend\NewsStoreRequest;
use App\Http\Requests\Backend\NewsUpdateRequest;


class NewsController extends BackendController
{
    protected $news;

    public function __construct(News $news){
        $this->news = $news;
    }

    public function index(){
        $news = $this->news->orderBy('updated_at', 'desc')->get();
        return view('backend.news.index', compact('news'));
    }

    public function create(){
        $route = URL::route('admin.news.store');
        $number_news = $this->news->count();
        $attachments = collect($this->getAllAttachment())->forPage(1,5);
        return view('backend.news.create', compact('route', 'attachments', 'number_news'));
    }

    public function edit($id){
        $route = URL::route('admin.news.update', $id);
        return view('backend.news.edit', compact('route'));
    }

    public function store(NewsStoreRequest $request){

        $status = ($request->input('status'))? true:false;

        $replacement_status = array('status' => $status);
        $content = htmlentities($request->input('content'),ENT_HTML5,'UTF-8');
        $replacement_content = array('content' => $content);
        $basket = array_replace($request->except('_token','files'), $replacement_status);
        $basket = array_replace($basket, $replacement_content);

        $save = $this->news->create($basket);

        if($save){
            return Redirect::route('admin.news.index')->with('success', '儲存成功');
        }else{
            return Redirect::route('admin.news.index')->with('error', '儲存失敗');
        }

    }

    public function update(NewsUpdateRequest $request){

    }

    public function destroy(){

    }


}
