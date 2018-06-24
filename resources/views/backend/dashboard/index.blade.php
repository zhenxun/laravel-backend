@extends('layouts.backend.app')

@section('content')

    <section class="bootstrap-grid mx-5 my-5">
        <div class="d-flex flex-wrap">

            @component('layouts.backend.components.action_box')
                @slot('icon')
                    fa-plus
                @endslot
                新增
            @endcomponent

        </div>
    </section>

@endsection
