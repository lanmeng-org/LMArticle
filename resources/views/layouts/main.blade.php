@extends('layouts.html')

@section('styles')
  <link rel="stylesheet" href="{{ asset('vendor/bootstrap/cerulean/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endsection

@section('body')
  @include('layouts._nav')

  <div class="container">
    @yield('content')
  </div>

  @include('layouts.footer')
@endsection

@section('scripts')
  @parent
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
@endsection
