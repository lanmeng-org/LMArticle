@extends('admin.layouts.main')

@section('title')
  @if(isset($data))
    编辑广告 - {{ $data->name }}
  @else
    新增广告
  @endif
@endsection

@section('content')
  @if(isset($data))
    {{ Form::model($data, ['route' => ['admin.advert.update', $data->getKey()], 'method' => 'put']) }}
  @else
    {{ Form::open(['route' => 'admin.advert.store', 'method' => 'post']) }}
  @endif

  @include('widgets.tips')

  <div class="form-group">
    <label for="name">广告名称</label>
    {{ Form::text('name', null, [
      'class' => 'form-control',
      'id' => 'name',
    ]) }}
  </div>

  <div class="form-group">
    <label for="content">广告内容</label>
    {{ Form::textarea('content', null, [
      'class' => 'form-control',
      'id' => 'content'
    ]) }}
  </div>

  <div class="box-footer text-center">
    <a href="{{ route('admin.advert.index') }}" class="btn btn-default">取消</a> &nbsp;
    <button type="submit" class="btn btn-success">提交</button>
  </div>
  {{ Form::close() }}
@endsection
