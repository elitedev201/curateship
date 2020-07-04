@extends('site2.layouts.app')
@section('content')
@endsection
<!doctype html>
<html lang="en">
<head>
  <title>Site 2</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <script>document.getElementsByTagName("html")[0].className += " js";</script>
  <script>
    if('CSS' in window && CSS.supports('color', 'var(--color-var)')) {
      document.write('<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">');
    } else {
      document.write('<link rel="stylesheet" href="{{ asset('assets/css/style-fallback.css') }}">');
    }
  </script>
  
  <noscript>
    <link rel="stylesheet" href="{{ asset('assets/css/style-fallback.css') }}">
  </noscript>

</head>
