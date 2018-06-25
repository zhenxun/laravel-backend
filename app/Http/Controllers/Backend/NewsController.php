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
        return view('backend.news.index');
    }

    public function create(){
        $route = URL::route('admin.news.store');
        return view('backend.news.create', compact('route'));
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