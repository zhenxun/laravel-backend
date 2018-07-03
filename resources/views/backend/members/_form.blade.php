<p class="h5"><strong>{{ trans('global.titles.faster-create') }}</strong></p>
{{ Form::open(array('url' => $csv_import_url, 'files' => true, 'class' => 'form-inline')) }}
    <div class="form-group mb-2">
      <label for="staticEmail2" class="sr-only">CSV :</label>
      <input type="text" readonly class="form-control-plaintext" id="staticEmail2" value="CSV :">
    </div>
    <div class="form-group mx-sm-3 mb-2">
      <label class="sr-only">csv file</label>
      <input type="file" name="csv" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary mb-2">
      <i class="fa fa-cloud-upload" aria-hidden="true"></i> &nbsp; 
      {{ trans('global.buttons.import') }}
    </button>
{{ Form::close() }}

<hr>

{{ Form::open(array('url' => $route)) }}

    @component('layouts.backend.components.form_header_box')
      @slot('open_attachment') false @endslot
      @slot('back') {{ route('admin.members.index') }} @endslot
    @endcomponent

      <div class="form-group">
        <label for="ename">{{ trans('form.members.ename.label') }}</label>
        <input type="text" class="form-control" id="ename" placeholder="{{ trans('form.members.ename.placeholder') }}">
      </div>

      <div class="form-group">
          <label for="cname">{{ trans('form.members.cname.label') }}</label>
          <input type="text" class="form-control" id="cname" placeholder="{{ trans('form.members.cname.placeholder') }}">
      </div>

      <div class="form-group">
          <label for="email">{{ trans('form.members.email.label') }}</label>
          <input type="email" class="form-control" id="email" placeholder="{{ trans('form.members.email.placeholder') }}">
      </div>

      <div class="form-group mb-0">
          <label for="gender">{{ trans('form.members.gender.label.default') }}</label>
      </div>
      <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="gender" id="male" value="male" checked>
          <label class="form-check-label" for="male">{{ trans('form.members.gender.label.male') }}</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="gender" id="female" value="female">
        <label class="form-check-label" for="female">{{ trans('form.members.gender.label.female') }}</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="gender" id="other" value="other">
        <label class="form-check-label" for="other">{{ trans('form.members.gender.label.other') }}</label>
      </div>

      <div class="form-group mb-0 mt-4">
          <label for="age-group">{{ trans('form.members.age_group.label.default') }}</label>
      </div>
      <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="age_group" id="a" value="A" checked>
          <label class="form-check-label" for="a">{{ trans('form.members.age_group.label.a') }}</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="age_group" id="b" value="B">
        <label class="form-check-label" for="b">{{ trans('form.members.age_group.label.b') }}</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="age_group" id="c" value="C">
        <label class="form-check-label" for="c">{{ trans('form.members.age_group.label.c') }}</label>
      </div>
      <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="age_group" id="d" value="D">
          <label class="form-check-label" for="d">{{ trans('form.members.age_group.label.d') }}</label>
      </div>

      <div class="form-group mt-4">
          <label for="contact_number">{{ trans('form.members.contact_number.label') }}</label>
          <input type="text" class="form-control" id="contact_number" placeholder="{{ trans('form.members.contact_number.placeholder') }}">
      </div>
      
      <div class="form-group mt-4">
          <label for="joining_date">{{ trans('form.members.joining_date.label') }}</label>
          <input type="text" class="form-control" id="joining_date" placeholder="{{ trans('form.members.joining_date.placeholder') }}">
      </div>

      <div class="form-group mt-4 mb-0">
          <label for="sms_email">{{ trans('form.members.sms_email.label') }}</label>
      </div>
      <div class="form-check">
          <input class="form-check-input" type="checkbox" name="recive_adv" id="sms_email" value="1">
          <label class="form-check-label" for="sms_email">
            {{ trans('form.members.sms_email.agree') }} ?
          </label>
      </div>
      
      <div class="form-group mt-4 mb-0">
          <label for="consent">{{ trans('form.members.consent.label') }}</label>
      </div>
      <div class="form-check">
          <input class="form-check-input" type="checkbox" name="consent" id="consent" value="1">
          <label class="form-check-label" for="consent">
            {{ trans('form.members.consent.agree') }} ?
          </label>
      </div> 

  {{ Form::close() }}
