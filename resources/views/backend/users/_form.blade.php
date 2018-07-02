{{ Form::open(array('url' => $route)) }}

      @if(isset($admin))
        {{ method_field('PUT') }}
      @endif

      @component('layouts.backend.components.form_header_box')
        @slot('open_attachment') fasle @endslot
        @slot('back') {{ route('admin.users.index') }} @endslot
      @endcomponent

      <div class="form-group">
          <label><h4>姓名:</h4></label>

          {{ Form::input(
              'text',
              'name',
              (isset($admin->name)? $admin->name:old('name')),
              ['class'=> 'form-control', 'placeholder' => '姓名'])
          }}
      </div>

      <div class="form-group">
          <label><h4>電子郵件:</h4></label>
          @if(isset($admin->email))
            @php($readonly = 'readonly')
          @else
            @php($readonly = '')
          @endif
          {{ Form::input(
              'text',
              'email',
              (isset($admin->email)? $admin->email:old('email')),
              ['class'=> 'form-control', 'placeholder' => '電子郵件', $readonly])
          }}
      </div>

      <div class="form-group">
          <label><h4>密碼:</h4></label>
          {{ Form::input('password', 'password', null, ['class'=> 'form-control', 'placeholder' => '密碼']) }}
      </div>

      <div class="form-group">
          <label><h4>確認密碼:</h4></label>
          {{ Form::input('password', 'password_confirmation', null, ['class'=> 'form-control', 'placeholder' => '確認密碼']) }}
      </div>

      <div class="form-group mb-0">
          <label><h4 class="mb-0">權限:</h4></label>
      </div>
      <div class="mb-3">
        @if(isset($admin))
          @if($admin['role']->role == 1)
            @php($superuser = 'checked') @php($moderate = '')@php($guest = '')
          @elseif($admin['role']->role == 2)
            @php($superuser = '') @php($moderate = 'checked') @php($guest = '')
          @else
            @php($superuser = '') @php($moderate = '') @php($guest = 'checked')
          @endif
        @else
          @php($superuser = '') @php($moderate = '') @php($guest = 'checked')
        @endif

          @if($permit)
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="role" id="superuser" value="1" {{ $superuser }}>
                <label class="form-check-label" for="superuser">超級管理者</label>
            </div>
          @endif

          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="role" id="moderate" value="2" {{ $moderate }}>
            <label class="form-check-label" for="moderate">中階管理者</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="role" id="guest" value="3" {{ $guest }}>
            <label class="form-check-label" for="guest">普通管理者</label>
          </div>
      </div>


      <div class="form-group mb-0">
          <label><h4 class="mb-0">狀態:</h4></label>
      </div>
      <div class="form-check">
        @if(isset($admin))
          @if($admin->status == 1)
            @php($status = '')
          @else
            @php($status = 'checked')
          @endif
        @else
          @php($status = '')
        @endif
          <input class="form-check-input" type="checkbox" value="true" name="status" id="status" {{ $status }}>
          <label class="form-check-label"  for="status">
            停權？
          </label>
      </div>



{{ Form::close() }}
