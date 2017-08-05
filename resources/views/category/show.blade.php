@extends('layouts.main')

@section('content')
  @include('category._breadcrumb')

  <div class="row">
    <div class="col-md-9">
      @include('category._articles')
    </div>

    <div class="col-md-3">
      @include('category._childCategories')
    </div>
  </div>
@endsection
