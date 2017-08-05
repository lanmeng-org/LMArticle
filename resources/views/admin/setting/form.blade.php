@extends('admin.layouts.main')

@section('title')
  系统设置
@endsection

@section('content')
  {{ Form::model($data, ['route' => 'admin.setting.update', 'class' => 'form-horizontal']) }}

  @include('widgets.tips')

  <div class="form-group">
    <label for="notice_show_home" class="col-sm-2 control-label">首页显示公告</label>
    <div class="col-sm-10">
    {{ Form::select('notice_show_home', ['隐藏', '显示'], null, [
      'id' => 'notice_show_home',
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

  <div class="form-group">
    <label for="home_category_article_number" class="col-sm-2 control-label">首页栏目文章数量</label>
    <div class="col-sm-10">
    {{ Form::text('home_category_article_number', null, [
      'id' => 'home_category_article_number',
      'class' => 'form-control',
    ]) }}
    </div>
  </div>

  <div class="form-group">
    <label for="article_list_number" class="col-sm-2 control-label">文章列表默认数量</label>
    <div class="col-sm-10">
    {{ Form::text('article_list_number', null, [
      'id' => 'article_list_number',
      'class' => 'form-control',
    ]) }}
    </div>
  </div>

  <div class="form-group">
    <label for="category_url_type" class="col-sm-2 control-label">分类URL类型</label>
    <div class="col-sm-10">
    {{ Form::select('category_url_type', \App\Models\Category::$urlTypes, null, [
      'id' => 'category_url_type',
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

