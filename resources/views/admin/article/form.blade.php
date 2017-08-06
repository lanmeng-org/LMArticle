@extends('admin.layouts.main')

@section('title')
  @if(isset($data))
    编辑文章 - {{ $data->title }}
  @else
    新增文章
  @endif
@endsection

@section('content')
  @if(isset($data))
    {{ Form::model($data, ['route' => ['admin.article.update', $data->getKey()], 'method' => 'put']) }}
  @else
    {{ Form::open(['route' => 'admin.article.store', 'method' => 'post']) }}
  @endif

  @include('widgets.tips')

  <div class="form-group">
    <label for="title">标题</label>
    {{ Form::text('title', null, [
      'class' => 'form-control',
      'id' => 'title',
    ]) }}
  </div>

  <div class="form-group">
    <label for="category_id">分类</label>
    {{ Form::select('category_id', $categories, null, [
      'class' => 'form-control',
      'id' => 'category_id'
    ]) }}
  </div>

  <div class="form-group">
    <label for="category_id">推荐</label>
    <div>
      {{ Form::checkbox('position[]', 1, null, [
        'class' => 'iCheck',
      ]) }}&nbsp; 文章页推荐 &nbsp;
      {{ Form::checkbox('position[]', 2, null, [
        'class' => 'iCheck',
      ]) }}&nbsp; 栏目页推荐 &nbsp;
      {{ Form::checkbox('position[]', 4, null, [
        'class' => 'iCheck',
      ]) }}&nbsp; 全站页推荐 &nbsp;
    </div>
  </div>

  <div class="form-group">
    <label for="content">内容</label>
    {{ Form::textarea('content', null, [
      'class' => 'form-control',
      'id' => 'content'
    ]) }}
  </div>

  <div class="box-footer text-center">
    <a href="{{ route('admin.article.index') }}" class="btn btn-default">取消</a> &nbsp;
    <button type="submit" class="btn btn-success">提交</button>
  </div>
  {{ Form::close() }}
@endsection

@section('styles')
  @parent
  <link rel="stylesheet" href="{{ asset('vendor/icheck/skins/square/blue.css') }}">
@endsection

@section('scripts')
  @parent
  <script src="{{ asset('vendor/icheck/icheck.js') }}"></script>

  <script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>
  <script src="{{ asset('vendor/ckeditor/config.js') }}"></script>
  <script>
    $('input.iCheck').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });

    CKEDITOR.replace('content', {
      height: '400px'
    })
  </script>
@endsection
