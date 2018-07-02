{{ Form::open(array("url" => $route, 'method' => 'put')) }}

    @component('layouts.backend.components.form_header_box')
      @slot('open_attachment') false @endslot
      @slot('back') {{ route('admin.dashboard') }} @endslot
    @endcomponent

    @foreach($settings as $setting)
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">{{ trans('setting.'. $setting->item) }}</label>
        <div class="col-sm-10">
          <input type="hidden" name="id[]" value="{{ $setting->id }}">
          @if($setting->item != 'locale')
            <input type="text" class="form-control" name="value[]" value="{{ $setting->value }}">
          @else

            @if($setting->value == 'en')
              @php($en = 'checked')
              @php($tw = '')
              @php($default_en = '('.trans('setting.default'). ')')
              @php($default_tw = '')
            @elseif($setting->value == 'zh-tw')
              @php($en = '')
              @php($tw = 'checked')
              @php($default_en = '')
              @php($default_tw = '('.trans('setting.default'). ')')
            @else
              @php($en = 'checked')
              @php($tw = '')
              @php($default_en = '('.trans('setting.default'). ')')
              @php($default_tw = '')
            @endif

          <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="en" value="en" {{ $en }}>
              <label class="form-check-label" for="en">
                <img src="{{ asset('images/en.png') }}"> &nbsp;
                {{ trans('setting.lang.en') }} {{ $default_en }} 
              </label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="tw" value="zh-tw" {{ $tw }}>
              <label class="form-check-label" for="tw">
                  <img src="{{ asset('images/zh-tw.png') }}"> &nbsp;
                {{ trans('setting.lang.zh-tw') }} {{ $default_tw }}
              </label>
            </div>            
          @endif
        </div> 
    </div>
    @endforeach

{{ Form::close() }}
  