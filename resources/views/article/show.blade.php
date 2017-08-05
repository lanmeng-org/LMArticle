@extends('layouts.main')

@section('title')
  {{ $title }}
@endsection

@section('metas')
  @parent
  <meta name="keywords" content="{{ $key }}" />
  <meta name="description" content="{{ $description }}" />
@endsection

@section('content')
  @include('article._breadcrumb')

  <div class="row">
    <div class="col-md-9">
      <div class="page-header article-title text-center">
        <h1>{{ $article->title }}</h1>
      </div>

      <div class="article-content">
        {!! $article->content !!}
      </div>
    </div>

    <div class="col-md-3">

      <div class="panel panel-default">
        <div class="panel-heading">
          更多推荐
        </div>
        <div class="list-group">
          <a href="" class="list-group-item">
            大大大大大大大大大大大
          </a>
        </div>
      </div>

      <div class="panel panel-default">
        <div class="panel-heading">
          热门资源
        </div>
        <div class="list-group">
          <a href="" class="list-group-item">
            大大大大大大大大大大大
          </a>
        </div>
      </div>
    </div>
  </div>

@endsection
