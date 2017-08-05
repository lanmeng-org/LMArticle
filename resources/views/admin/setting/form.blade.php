@extends('admin.layouts.main')

@section('title')
  系统设置
@endsection

@section('pageHeader')
  <ul class="nav nav-tabs" style="margin-bottom: 1rem;">
    <li class="active">
      <a href="#nav-tabs-sys" data-toggle="tab" aria-expanded="true">系统设置</a>
    </li>
    <li>
      <a href="#nav-tabs-seo" data-toggle="tab" aria-expanded="false">SEO设置</a>
    </li>
  </ul>
@endsection

@section('content')
  {{ Form::model($data, ['route' => 'admin.setting.update', 'class' => 'form-horizontal']) }}

  @include('widgets.tips')

  <div class="tab-content">
    <div class="tab-pane fade active in" id="nav-tabs-sys">
      @include('admin.setting._sys')
    </div>
    <div class="tab-pane fade" id="nav-tabs-seo">
      @include('admin.setting._seo')
    </div>
  </div>

  <div class="box-footer text-center">
    <a href="{{ route('admin.setting.update') }}" class="btn btn-default">取消</a> &nbsp;
    <button type="submit" class="btn btn-success">提交</button>
  </div>
  {{ Form::close() }}
@endsection

