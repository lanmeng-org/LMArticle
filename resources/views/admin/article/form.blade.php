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

@section('scripts')
  @parent
  <script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>
  <script src="{{ asset('vendor/ckeditor/config.js') }}"></script>
  <script>
    CKEDITOR.replace('content', {
      height: '400px'
    })
  </script>
@endsection
