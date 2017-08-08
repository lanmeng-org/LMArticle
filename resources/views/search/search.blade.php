@extends('layouts.main')

@section('title')
  《{{ $words }}》相关内容@if($articles->currentPage() > 1)_第{{ $articles->currentPage() }}页@endif
@endsection

@section('content')
  @include('widgets.search_bar')

  @include('widgets.article_list')

  {{ $articles->appends(Request::all())->links() }}
@endsection
