@extends('layouts.backend.app')

@section('content')

    <section class="bootstrap-grid mx-5 my-5">
        <div class="d-flex flex-wrap">

            @component('layouts.backend.components.action_box')
                @slot('icon') fa-paper-plane @endslot
                @slot('url') {{ route('admin.news.index') }} @endslot
                {{ trans('dashboard.news') }}
            @endcomponent

<<<<<<< Updated upstream
            @component('layouts.backend.components.action_box')
                @slot('icon') fa-users @endslot
                @slot('url') {{ route('admin.users.index') }} @endslot
                帳號管理
            @endcomponent
=======
            @if($permit)
                @component('layouts.backend.components.action_box')
                    @slot('icon') fa-users @endslot
                    @slot('url') {{ route('admin.users.index') }} @endslot
                    {{ trans('dashboard.administrator') }}
                @endcomponent
            @endif
>>>>>>> Stashed changes

        </div>
    </section>

@endsection
