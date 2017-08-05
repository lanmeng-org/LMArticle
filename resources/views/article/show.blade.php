@extends('layouts.main')

@section('content')
  @include('article._breadcrumb')

  <div class="page-header article-title text-center">
    <h1>{{ $article->title }}</h1>
  </div>

  <div class="article-content">
    {!! $article->content !!}
  </div>
@endsection
