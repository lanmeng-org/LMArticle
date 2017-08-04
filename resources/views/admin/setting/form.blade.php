@extends('admin.layouts.main')

@section('title')
  系统设置
@endsection

@section('content')
  {{ Form::model($data, ['route' => 'admin.setting.update', 'class' => 'form-horizontal']) }}

  @include('widgets.tips')

  <div class="form-group">
    <label for="notice_show_index" class="col-sm-2 control-label">首页显示公告</label>
    <div class="col-sm-10">
    {{ Form::select('notice_show_index', ['隐藏', '显示'], null, [
      'id' => 'notice_show_index',
      'class' => 'form-control',
    ]) }}
    </div>
  </div>
  <div class="form-group">
    <label for="notice_show_number" class="col-sm-2 control-label">公告显示数量</label>
    <div class="col-sm-10">
    {{ Form::text('notice_show_number', null, [
      'id' => 'notice_show_number',
      'class' => 'form-control',
    ]) }}
    </div>
  </div>

  <div class="box-footer text-center">
    <a href="{{ route('admin.setting.update') }}" class="btn btn-default">取消</a> &nbsp;
    <button type="submit" class="btn btn-success">提交</button>
  </div>
  {{ Form::close() }}
@endsection

