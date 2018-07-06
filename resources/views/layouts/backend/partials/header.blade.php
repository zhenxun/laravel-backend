<header class="page-header">
  <div class="container-fluid">
    <div class="row page-header-row">
        <div class="col-8">
             <h1 class="page-header-title">
                {{ trans('header.title.'. config('global.title')) }}
            </h1>
                        
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb page-header-breadcrumb">
                <li class="breadcrumb-item page-header-breadcrumb-item " aria-current="page">
                    <a href="{{ route('admin.dashboard') }}" class="page-header-breadcrumb-item-home">
                    {{ trans('header.breadcrumb.home') }}
                    </a>
                </li>

                  <li class="breadcrumb-item page-header-breadcrumb-item{{ (config('global.method') == 'index')? '-active':'' }}" aria-current="page">
                      @if(config('global.method') == 'index')
                      {{ trans('header.breadcrumb.'.config('global.title').'.'.config('global.method')) }}
                      @else
                        {{ trans('header.breadcrumb.'.config('global.title').'.index')}}
                      @endif
                  </li>
                  @if(config('global.method') != 'index')
                  <li class="breadcrumb-item page-header-breadcrumb-item-active" aria-current="page">
                    {{ trans('header.breadcrumb.'.config('global.title').'.'.config('global.method')) }}
                  </li>
                  @endif
                </ol>
            </nav>
        </div>
        <div class="col-4 px-0 my-3">
            <div class="col-10 px-0">
                <input class="form-control form-control-lg page-header-input-search" type="text" placeholder="{{ trans('header.searchbar') }}">
            </div>
        </div>
    </div>
  </div>

</header>
