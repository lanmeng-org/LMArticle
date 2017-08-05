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
  @include('category._breadcrumb')

  <div class="row">
    <div class="col-md-9">
      @include('category._articles')
    </div>

    <div class="col-md-3">
      @include('category._right')
    </div>
  </div>
@endsection
