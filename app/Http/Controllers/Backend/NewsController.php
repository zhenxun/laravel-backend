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
        $title = $this->getHeaderTitle();
        $method = $this->getHeaderMethod();
    }

    public function index(){
        $news = $this->news->orderBy('updated_at', 'desc')->get();
        return view('backend.news.index', compact(
            'title', 'method', 'news'
        ));
    }

    public function create(){
        $route = URL::route('admin.news.store');
        $number_news = $this->news->count();
        $attachments = collect($this->getAllAttachment())->forPage(1,5);
        $number_news = ($this->news->count() != 0)? ($this->news->count() + 1 ):1;
        return view('backend.news.create', compact('route', 'attachments', 'number_news'));
    }

    public function edit($id){
        $route = URL::route('admin.news.update', $id);
        $news = $this->news->where('id', $id)->firstOrFail();
        $content = html_entity_decode($news->content,ENT_HTML5,'UTF-8');
        $number_news = $this->news->count();
        return view('backend.news.edit', compact('route', 'news', 'content' ,'number_news'));
    }

    public function show($id){
        $news = $this->news->where('id', $id)->firstOrFail();
        $content = html_entity_decode($news->content,ENT_HTML5,'UTF-8');
        return view('backend.news.show', compact('news', 'content'));
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
            return Redirect::route('admin.news.index')->with('success', trans('messages.success'));
        }else{
            return Redirect::route('admin.news.index')->with('error', trans('messages.failed'));
        }

    }

    public function update(NewsUpdateRequest $request, $id){

        $old = $this->news->find($id);
        $change = $this->news->where('rank', $request->input('rank'))->first();

        $status = ($request->input('status'))? true:false;

        $replacement_status = array('status' => $status);
        $content = htmlentities($request->input('content'),ENT_HTML5,'UTF-8');
        $replacement_content = array('content' => $content);

        $basket = array_replace($request->except('_token', '_method' ,'files'), $replacement_status);
        $basket = array_replace($basket, $replacement_content);
        
        if($old->rank != $request->input('rank')){
            $update_rank = $this->news->where('id', $change->id)->update([
                'rank' => $old->rank,
            ]);
        }

        $update = $this->news->where('id', $id)->update($basket);

        if($update){
            return Redirect::route('admin.news.index')->with('success', trans('messages.success'));
        }else{
            return Redirect::route('admin.news.index')->with('error', trans('messages.failed'));
        }

    }

    public function destroy($id){

        $if_news_exist = $this->news->where('id', $id)->exists();

        if($if_news_exist){
            $delete = $this->news->where('id', $id)->delete();
        }else{
            $delete = false;
        }

        if($delete){
            return Redirect::route('admin.news.index')->with('success', trans('messages.success-del'));
        }else{
            return Redirect::route('admin.news.index')->with('error', trans('messages.failed-del'));
        }

    }


}
