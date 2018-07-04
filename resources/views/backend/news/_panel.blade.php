<div class="card ">
    <div class="card-header bg-gradient-info text-white d-flex justify-content-between">
        <span><strong> {{ $news->title }} </strong></span>
        <span class="text-right"><small>{{ trans('global.titles.publish') }} : {{ $news->updated_at->format('Y-m-d H:i:s') }}</small></span>
    </div>
    <div class="card-body">
        {!! $content !!}
    </div>
</div>