@if(!isset($member))
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
    <p class="mt-2"><a href="{{ Storage::url('csv/csv_example.csv') }}" target="_blank"> Download Example CSV </a></p>
@endif
<hr>

{{ Form::open(array('url' => $route)) }}

    @if(isset($member))
        {{ method_field('PUT') }}
    @endif

    @component('layouts.backend.components.form_header_box')
      @slot('open_attachment') false @endslot
      @slot('back') {{ route('admin.members.index') }} @endslot
    @endcomponent

      <div class="form-group">
        <label for="ename">{{ trans('form.members.ename.label') }}</label>
        <input type="text" 
                class="form-control" id="ename" 
                name="ename" placeholder="{{ trans('form.members.ename.placeholder') }}"
                value="{{ $member->ename or old('ename') }}">
      </div>

      <div class="form-group">
          <label for="cname">{{ trans('form.members.cname.label') }}</label>
          <input type="text" 
                class="form-control" id="cname" 
                name="cname" placeholder="{{ trans('form.members.cname.placeholder') }}" 
                value="{{ $member->cname or old('cname') }}">
      </div>

      <div class="form-group">
          <label for="email">{{ trans('form.members.email.label') }}</label>
          <input type="email" 
                class="form-control" id="email" 
                name="email" placeholder="{{ trans('form.members.email.placeholder') }}" 
                value="{{ $member->email or old('email') }}">
      </div>

      <div class="form-group mb-0">
          <label for="gender">{{ trans('form.members.gender.label.default') }}</label>
      </div>
      @if(!empty($member))
        @switch($member->gender)
            @case('male')
                @php($gender = array(true, false, false))
                @break
            @case('female')
            @php($gender = array(false, true, false))
                @break
            @case('other')
                @php($gender = array(false, false, true))
                @break
        @endswitch
      @else
        @php($gender = array(true, false, false))
      @endif

      <div class="form-check form-check-inline">
          {{ Form::radio('gender', 'male', $gender[0], ['class' => 'form-check-input']) }}
          <label class="form-check-label" for="male">{{ trans('form.members.gender.label.male') }}</label>
      </div>
      <div class="form-check form-check-inline">
          {{ Form::radio('gender', 'female', $gender[1], ['class' => 'form-check-input']) }}
        <label class="form-check-label" for="female">{{ trans('form.members.gender.label.female') }}</label>
      </div>
      <div class="form-check form-check-inline">
          {{ Form::radio('gender', 'other', $gender[2], ['class' => 'form-check-input']) }}
        <label class="form-check-label" for="other">{{ trans('form.members.gender.label.other') }}</label>
      </div>

      <div class="form-group mb-0 mt-4">
          <label for="age-group">{{ trans('form.members.age_group.label.default') }}</label>
      </div>

      @if(!empty($member))
        @switch($member->age_group)
            @case('A')
                @php($age_group = array(true, false, false, false))
                @break
            @case('B')
                @php($age_group = array(false, true, false, false))
                @break
            @case('C')
                @php($age_group = array(false, false, true, false))
                @break
            @case('D')
                @php($age_group = array(false, false, false, true))
                @break
        @endswitch
      @else
        @php($age_group = array(true, false, false, false))
      @endif

      <div class="form-check form-check-inline">
          {{ Form::radio('age_group', 'A', $age_group[0], ['class' => 'form-check-input']) }}
          <label class="form-check-label" for="a">{{ trans('form.members.age_group.label.a') }}</label>
      </div>
      <div class="form-check form-check-inline">
            {{ Form::radio('age_group', 'B',  $age_group[1], ['class' => 'form-check-input']) }}
        <label class="form-check-label" for="b">{{ trans('form.members.age_group.label.b') }}</label>
      </div>
      <div class="form-check form-check-inline">
            {{ Form::radio('age_group', 'C',  $age_group[2], ['class' => 'form-check-input']) }}
        <label class="form-check-label" for="c">{{ trans('form.members.age_group.label.c') }}</label>
      </div>
      <div class="form-check form-check-inline">
            {{ Form::radio('age_group', 'D',  $age_group[3], ['class' => 'form-check-input']) }}
          <label class="form-check-label" for="d">{{ trans('form.members.age_group.label.d') }}</label>
      </div>

      <div class="form-group mt-4">
          <label for="contact_number">{{ trans('form.members.contact_number.label') }}</label>
          <input type="text" 
                class="form-control" id="contact_number" 
                name="contact_no" placeholder="{{ trans('form.members.contact_number.placeholder') }}"
                value="{{ $member->contact_number or old('contact_number') }}">
      </div>
      
      <div class="form-group mt-4">
          <label for="joining_date">{{ trans('form.members.joining_date.label') }}</label>
          <input type="text" 
                class="form-control" id="joining_date" 
                name="joining_date" placeholder="{{ trans('form.members.joining_date.placeholder') }}"
                value="{{ $member->joining_date or old('joining_date') }}">
      </div>

        <div class="form-group mt-4">
            <label for="remarks">{{ trans('form.members.remarks.label') }}</label>
            <input type="text" 
                    class="form-control" id="remarks" 
                    name="remarks" placeholder="{{ trans('form.members.remarks.placeholder') }}" 
                    value="{{ $member->remarks or old('remarks') }}">
        </div>

      <div class="form-group mt-4 mb-0">
          <label for="sms_email">{{ trans('form.members.sms_email.label') }}</label>
      </div>
      <div class="form-check">
          @if(!empty($member))
            @if($member->recive_adv == 1)
                @php($recive_adv = true)
            @else
                @php($recive_adv = false)
            @endif
          @else
            @php($recive_adv = false)
          @endif
          {{ Form::checkbox('recive_adv', '1', $recive_adv, ['class' => 'form-check-input', 'id' => 'sms_email']) }}
          <label class="form-check-label" for="sms_email">
            {{ trans('form.members.sms_email.agree') }} ?
          </label>
      </div>
      
      <div class="form-group mt-4 mb-0">
          <label for="consent">{{ trans('form.members.consent.label') }}</label>
      </div>
      <div class="form-check">
            @if(!empty($member))
                @if($member->consent == 1)
                    @php($consent = true)
                @else
                    @php($consent = false)
                @endif
             @else
                @php($consent = false)
            @endif
            {{ Form::checkbox('consent', '1', $consent, ['class' => 'form-check-input', 'id' => 'consent']) }}
          <label class="form-check-label" for="consent">
            {{ trans('form.members.consent.agree') }} ?
          </label>
      </div> 

  {{ Form::close() }}
