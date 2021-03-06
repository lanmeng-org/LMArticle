@extends('layouts.html')

@section('title')
  登录
@endsection

@section('styles')
  <link rel="stylesheet" href="{{ asset('vendor/bootstrap/cerulean/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
@endsection

@section('body')
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default login-panel">
          <div class="panel-heading">登录</div>
          <div class="panel-body">
            <form class="form-horizontal" method="POST" action="{{ route('login') }}">
              {{ csrf_field() }}

              <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email" class="col-md-4 control-label">邮箱</label>

                <div class="col-md-6">
                  <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                  @if ($errors->has('email'))
                    <span class="help-block">
                      <strong>{{ $errors->first('email') }}</strong>
                    </span>
                  @endif
                </div>
              </div>

              <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password" class="col-md-4 control-label">密码</label>

                <div class="col-md-6">
                  <input id="password" type="password" class="form-control" name="password" required>

                  @if($errors->has('password'))
                    <span class="help-block">
                      <strong>{{ $errors->first('password') }}</strong>
                    </span>
                  @endif
                </div>
              </div>

              <div class="form-group{{ $errors->has('verify') ? ' has-error' : '' }}">
                <label for="verify" class="col-md-4 control-label">验证码</label>

                <div class="col-md-6">
                  <input id="verify" type="text" class="form-control" name="verify" required>

                  @if($errors->has('verify'))
                    <span class="help-block">
                      <strong>{{ $errors->first('verify') }}</strong>
                    </span>
                  @endif
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-4"></div>
                <div class="col-md-6">
                  <img src="{{ captcha_src() }}" id="verify-image">
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> 记住登录
                    </label>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-8 col-md-offset-4">
                  <button class="btn btn-primary">登录</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('scripts')
  @parent
  <script>
    $(function () {
      var loginPanel = $('.login-panel');

      var resize = function () {
        loginPanel.css({
          'margin-top': ($(window).height() - loginPanel.height()) * 0.4
        });
      };

      resize();
      $(window).resize(resize);

      $('#verify-image').click(function () {
        $(this).attr('src', $(this).attr('src') + Math.random())
      })
    });
  </script>
@endsection
