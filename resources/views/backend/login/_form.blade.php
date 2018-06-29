{{ Form::open(array('route' => 'admin.login.submit', 'class' => 'form-signin')) }}

  <img class="mb-4" src="{{ asset('images/logo.png') }}" alt="" width="72" height="72">
  <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>

  @include('layouts.backend.components.alert.alert')

  <label for="inputEmail" class="sr-only">Email address</label>
  {{ Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Email address', 'required', 'autofocus']) }}
  @if ($errors->has('email'))
    <small id="passwordHelpBlock" class="form-text text-danger mb-2">
        <strong>{{ $errors->first('email') }}</strong>
    </small>
  @endif

  <label for="inputPassword" class="sr-only">Password</label>
  {{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password', 'required']) }}
  @if ($errors->has('password'))
  <small id="passwordHelpBlock" class="form-text text-danger mb-2">
      <strong>{{ $errors->first('password') }}</strong>
  </small>
  @endif

  <div class="checkbox mb-3">
    <label>
        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
    </label>
  </div>
  <button type="submit" class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
  <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>

{{ Form::close() }}