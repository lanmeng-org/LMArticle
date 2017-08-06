@extends('admin.layouts.main')

@section('title')
  @if(isset($data))
    编辑友情链接 - {{ $data->title }}
  @else
    新增友情链接
  @endif
@endsection

@section('content')
  @if(isset($data))
    {{ Form::model($data, ['route' => ['admin.link.update', $data->getKey()], 'method' => 'put']) }}
  @else
    {{ Form::open(['route' => 'admin.link.store', 'method' => 'post']) }}
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
    <label for="link">链接</label>
    {{ Form::text('link', null, [
      'class' => 'form-control',
      'id' => 'link',
    ]) }}
  </div>

  <div class="form-group">
    <label for="order">排序</label>
    {{ Form::number('order', isset($data) ? null : 0, [
      'class' => 'form-control',
      'id' => 'order',
    ]) }}
  </div>

  <div class="box-footer text-center">
    <a href="{{ route('admin.link.index') }}" class="btn btn-default">取消</a> &nbsp;
    <button type="submit" class="btn btn-success">提交</button>
  </div>
  {{ Form::close() }}
@endsection
