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
  <ul class="breadcrumb">
    <li><a href="{{ url('/') }}">主页</a></li>
    <li class="active">公告</li>
  </ul>

  <div class="row">
    <div class="col-md-9">
      <div class="panel panel-primary">

        <div class="panel-heading">公告</div>

        <div class="list-group">
          @foreach($notices as $item)
            <a href="{{ route('notice.show', ['id' => $item->getKey()]) }}" class="list-group-item">
              {{ $item->title }}
            </a>
          @endforeach
        </div>

        @if($notices->lastPage() > 1)
          <div class="pagination pull-right clearfix">
            {{ $notices->links() }}
          </div>
        @endif
      </div>
    </div>

    <div class="col-md-3">
      @include('notice._right_articles')
    </div>
  </div>
@endsection
