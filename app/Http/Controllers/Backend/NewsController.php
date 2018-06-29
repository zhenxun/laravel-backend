<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\BackendController;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Redirect;
use App\Models\News;


class NewsController extends BackendController
{
    protected $news;

    public function __construct(News $news){
        $this->news = $news;
    }

    public function index(){
        $news = $this->news->orderBy('created_at', 'desc')->get();
        return view('backend.news.index', compact('attachments', 'news'));
    }

    public function create(){
        $route = URL::route('admin.news.store');
        $attachments = collect($this->getAllAttachment())->forPage(1,5);
        $number_news = $this->news->count();
        return view('backend.news.create', compact('route', 'attachments', 'number_news'));
    }

    public function edit($id){
        $route = URL::route('admin.news.update', $id);
        return view('backend.news.edit', compact('route'));
    }

    public function store(){

    }

    public function update(){

    }

    public function destroy(){

    }


}
