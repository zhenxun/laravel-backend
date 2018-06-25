@extends('layouts.backend.app')

@section('content')

<div class="container my-5 ">
    <div class="row">
        <div class="col-12 p-4 form-div">

          @component('layouts.backend.components.form_header_box')
            @slot('attachment') {{ route('admin.news.index') }} @endslot
            @slot('back') {{ route('admin.news.index') }} @endslot
          @endcomponent
    
          @include('backend.news._form')

        </div>
    </div>
</div>

@endsection