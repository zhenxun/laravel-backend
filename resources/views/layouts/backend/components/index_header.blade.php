<div class="col-12 text-right mb-5 index-header-box px-0">
    <div class="col-md-4 offset-md-8 px-0">
        <div class="d-flex justify-content-end px-0">
            @if($create == 'true')
                <div class="mr-4">
                    <a href="{{ $url_create }}"> 
                        <i class="fa fa-plus"></i> {{ trans('header.index.add') }}
                    </a>
                </div>
            @endif
            @if($edit == 'true')
                <div class="mr-4">
                    <a href="{{ $url_edit }}"> 
                        <i class="fa fa-pencil"></i> {{ trans('header.index.edit') }}
                    </a>
                </div>
            @endif
            <div class="">
                <a href="{{ $url_back  }}"> 
                    <i class="fa fa-angle-left"></i> {{ trans('header.index.back') }}
                </a>                                
            </div>
        </div>
    </div>
</div>