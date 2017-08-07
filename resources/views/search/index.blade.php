@extends('layouts.main')

@section('title')
  热门搜索
@endsection

@section('container')
  @include('widgets.search_bar')

  <div class="book-list-empty">搜索词不能为空或过长</div>

  @include('widgets.search_words')
@endsection
