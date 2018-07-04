@extends('layouts.backend.app')

@section('content')

<div class="container my-5 ">
    <div class="row">
        <div class="col-12 p-4 form-div">
    
            @component('layouts.backend.components.index_header')
              @slot('create') false @endslot
              @slot('edit') true @endslot
              @slot('url_edit') {{ route('admin.news.edit', $news->id) }} @endslot
              @slot('url_back') {{ route('admin.news.index') }} @endslot
            @endcomponent
          
            @include('backend.news._panel')

        </div>
    </div>
</div>

@endsection