@extends('layouts.main')

@section('content')
  <div class="row">
    @include('home._notices')
    @include('home._category_articles')
  </div>
@endsection
