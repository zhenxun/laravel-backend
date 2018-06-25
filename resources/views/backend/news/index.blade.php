@extends('layouts.backend.app')

@section('content')

    <div class="container my-5 ">
        <div class="row">
            <div class="col-12 p-4 form-div">

                <div class="col-12 text-right index-header-box">
                    <a href="{{ route('admin.news.create') }}"> 
                        <i class="fa fa-plus"></i> 新增
                    </a>
                </div>

            </div>
        </div>
    </div>

@endsection