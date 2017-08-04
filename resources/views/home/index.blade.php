@extends('layouts.main')

@section('content')
  <div class="row">

    <div class="col-md-12">
      <div class="panel panel-primary">
        <div class="panel-heading">公告</div>
        <div class="list-group">
          @foreach(\App\Repositories\NoticeRepo::getList(3) as $item)
            <a href="{{ url('') }}" class="list-group-item">{{ $item->title }}</a>
          @endforeach
        </div>
      </div>
    </div>

    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          足球下载
          <div class="pull-right">
            <a href="">查看更多</a>
          </div>
        </div>
        <div class="list-group">
          @foreach(\App\Repositories\ArticleRepo::getList(5) as $item)
            <a href="{{ url('') }}" class="list-group-item">{{ $item->title }}</a>
          @endforeach
        </div>
      </div>
    </div>


  </div>
@endsection
