<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="{{ asset('images/favicon.ico') }}">

    <title>Laravel Backend</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.css" rel="stylesheet">

  </head>

  <body id="app">
      @include('layouts.backend.partials.top-menu')

      @include('layouts.backend.partials.header')

      @yield('content')

      @include('layouts.backend.partials.footer')

      
      <script src="{{ asset('js/app.js') }}"></script>
      <script src="{{ asset('js/init-summernote.js') }}"></script>
      <script src="{{ asset('js/init-modal.js') }}"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.js"></script>
  </body>
</html>
