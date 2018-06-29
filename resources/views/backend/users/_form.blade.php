{{ Form::open(array('url' => $route)) }}

      @component('layouts.backend.components.form_header_box')
        @slot('open_attachment') fasle @endslot
        @slot('back') {{ route('admin.users.index') }} @endslot
      @endcomponent

      <div class="form-group">
          <label><h4>姓名:</h4></label>
          {{ Form::input('text', 'name', null, ['class'=> 'form-control', 'placeholder' => '姓名']) }}
      </div>

      <div class="form-group">
          <label><h4>電子郵件:</h4></label>
          {{ Form::input('text', 'email', null, ['class'=> 'form-control', 'placeholder' => '電子郵件']) }}
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
          @if($admin['role']->role == 1)
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="role" id="inlineRadio1" value="1">
                <label class="form-check-label" for="inlineRadio1">超級管理者</label>
            </div>
          @endif

          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="role" id="inlineRadio2" value="2">
            <label class="form-check-label" for="inlineRadio2">中階管理者</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="role" id="inlineRadio3" value="3">
            <label class="form-check-label" for="inlineRadio3">普通管理者</label>
          </div>
      </div>


      <div class="form-group mb-0">
          <label><h4 class="mb-0">狀態:</h4></label>
      </div>
      <div class="form-check">
          <input class="form-check-input" type="checkbox" value="true" name="status" id="status">
          <label class="form-check-label"  for="status">
            停權？
          </label>
      </div>      
     


{{ Form::close() }}