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
    {{ Form::model($data, ['route' => ['admin.category.update', $data->getKey()], 'method' => 'put']) }}
  @else
    {{ Form::open(['route' => 'admin.category.store', 'method' => 'post']) }}
  @endif

  @include('widgets.tips')

  <div class="form-group">
    <label for="display_name">显示名称</label>
    {{ Form::text('display_name', null, [
      'class' => 'form-control',
      'id' => 'display_name',
      'placeholder' => '分类具体显示的名称',
    ]) }}
  </div>

  <div class="form-group">
    <label for="name">标识名称</label>
    {{ Form::text('name', null, [
      'class' => 'form-control',
      'id' => 'name',
      'placeholder' => '用作分类的路径或其它',
    ]) }}
  </div>

  <div class="form-group">
    <label for="parent_id">父分类</label>
    @if(isset($data) && !$data->childCategory->isEmpty())
      <input value="顶级分类" class="form-control" disabled>
    @else
      {{ Form::select('parent_id', ['顶级分类'] + $parentCategories, null, [
        'class' => 'form-control',
        'id' => 'parent_id'
      ]) }}
    @endif
  </div>

  <div class="form-group">
    <label for="order">排序</label>
    {{ Form::number('order', isset($data) ? null : 0, [
      'class' => 'form-control',
      'id' => 'order'
    ]) }}
  </div>

  <div class="form-group">
    <label for="show_nav">是否在导航显示</label>
    {{ Form::select('show_nav', ['否', '是'], null, [
      'class' => 'form-control',
      'id' => 'show_nav'
    ]) }}
  </div>

  <div class="form-group">
    <label for="show_home">是否在首页显示</label>
    {{ Form::select('show_home', ['否', '是'], null, [
      'class' => 'form-control',
      'id' => 'show_home'
    ]) }}
  </div>

  <div class="show_home_child" style="padding-left: 1rem;display: none;">
    <div class="form-group">
      <label for="show_column">显示大小</label>
      {{ Form::select('show_column', config('site.column_list'), null, [
        'class' => 'form-control',
        'id' => 'show_column',
      ]) }}
    </div>

    <div class="form-group">
      <label for="show_column_color">标题背景色</label>
      {{ Form::select('show_column_color', \App\Models\Category::$showColumnColors, null, [
        'class' => 'form-control',
        'id' => 'show_column_color',
      ]) }}
    </div>
  </div>

  <div class="box-footer text-center">
    <a href="{{ route('admin.category.index') }}" class="btn btn-default">取消</a> &nbsp;
    <button type="submit" class="btn btn-success">提交</button>
  </div>
  {{ Form::close() }}
@endsection

@section('scripts')
  @parent
  <script>
    function showHomeChild() {
      if (parseInt($('#show_home').val())) {
        $('.show_home_child').show();
      } else {
        $('.show_home_child').hide();
      }
    }

    showHomeChild();
    $('#show_home').change(function () {
      showHomeChild();
    });

  </script>
@endsection
