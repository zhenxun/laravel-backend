<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="{{ asset('images/favicon.ico') }}">

    <title>Login</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
  </head>

  <body id="app" class="text-center login-body">

      @yield('content')
      
      <script src="{{ asset('js/app.js') }}"></script>
  </body>
</html>
