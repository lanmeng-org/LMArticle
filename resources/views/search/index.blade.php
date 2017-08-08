@extends('layouts.main')

@section('title')
  热门搜索
@endsection

@section('content')
  @include('widgets.search_bar')

  <div class="article-list-empty">搜索词不能为空或过长</div>

  @include('widgets.search_words')
@endsection
