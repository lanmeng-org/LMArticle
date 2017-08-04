@extends('admin.layouts.main')

@section('title')
  @if(isset($data))
    编辑分类 - {{ $data->display_name }}
  @else
    新增分类
  @endif
@endsection

@section('content')
  @if(isset($data))
    {{ Form::model($data, ['route' => ['admin.category.update', $data->id], 'method' => 'put']) }}
  @else
    {{ Form::open(['route' => 'admin.category.store', 'method' => 'post']) }}
  @endif

  @include('widgets.tips')

  <div class="form-group">
    <label for="name">标识名称</label>
    {{ Form::text('name', null, [
      'class' => 'form-control',
      'id' => 'name',
      'placeholder' => '用作分类的路径或其它',
    ]) }}
  </div>

  <div class="form-group">
    <label for="display_name">显示名称</label>
    {{ Form::text('display_name', null, [
      'class' => 'form-control',
      'id' => 'display_name',
      'placeholder' => '分类具体显示的名称',
    ]) }}
  </div>

  <div class="form-group">
    <label for="order">排序</label>
    {{ Form::number('order', 0, [
      'class' => 'form-control',
      'id' => 'order'
    ]) }}
  </div>

  <div class="form-group">
    <label for="parent_id">父分类</label>
    {{ Form::select('parent_id', ['顶级分类'] + $parentCategories, null, [
      'class' => 'form-control',
      'id' => 'parent_id'
    ]) }}
  </div>

  <div class="box-footer text-center">
    <a href="{{ route('admin.category.index') }}" class="btn btn-default">取消</a> &nbsp;
    <button type="submit" class="btn btn-success">提交</button>
  </div>
  {{ Form::close() }}
@endsection
