@extends('layouts.main')

@section('title')
  {{ $title }}
@endsection

@section('content')
  <div class="row">
    @include('home._notices')
    @include('home._category_articles')
  </div>
@endsection
