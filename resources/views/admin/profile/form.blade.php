@extends('admin.layouts.main')

@section('title')
  修改资料
@endsection

@section('content')
  {{ Form::model($data, ['route' => 'admin.profile.update', 'class' => 'form-horizontal']) }}

  @include('widgets.tips')

  <div class="form-group">
    <label for="name" class="col-sm-2 control-label">用户名</label>
    <div class="col-sm-10">
      {{ Form::text('name', null, [
        'id' => 'name',
        'class' => 'form-control',
      ]) }}
    </div>
  </div>

  <div class="form-group">
    <label for="email" class="col-sm-2 control-label">邮箱</label>
    <div class="col-sm-10">
      {{ Form::text('email', null, [
        'id' => 'email',
        'class' => 'form-control',
      ]) }}
    </div>
  </div>

  <div class="form-group">
    <label for="oldPassword" class="col-sm-2 control-label">旧密码</label>
    <div class="col-sm-10">
      {{ Form::password('oldPassword', [
        'id' => 'oldPassword',
        'class' => 'form-control',
      ]) }}
    </div>
  </div>

  <div class="form-group">
    <label for="password" class="col-sm-2 control-label">新密码</label>
    <div class="col-sm-10">
      {{ Form::password('password', [
        'id' => 'password',
        'class' => 'form-control',
      ]) }}
    </div>
  </div>

  <div class="form-group">
    <label for="password_confirmation" class="col-sm-2 control-label">确认新密码</label>
    <div class="col-sm-10">
      {{ Form::password('password_confirmation', [
        'id' => 'password_confirmation',
        'class' => 'form-control',
      ]) }}
    </div>
  </div>

  <div class="box-footer text-center">
    <button type="submit" class="btn btn-success">提交</button>
  </div>
  {{ Form::close() }}
@endsection

