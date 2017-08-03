@extends('layouts.html')

@section('styles')
  <link rel="stylesheet" href="{{ asset('vendor/bootstrap/cerulean/bootstrap.min.css') }}">
@endsection

@section('body')
  @include('admin.layouts._nav')

  <div class="container">
    @yield('content')
  </div>

  <div class="modal resource-destroy">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">提示</h4>
        </div>
        <div class="modal-body">
          <p>你确定要删除吗?</p>
        </div>
        <div class="modal-footer">
          {{ Form::open(['method' => 'DELETE', 'class' => 'destroy-form']) }}
          <button type="button" class="btn btn-info" data-dismiss="modal">取消</button>
          <button type="submit" class="btn btn-danger">确定</button>
          {{ Form::close() }}
        </div>
      </div>
    </div>
  </div>
@endsection

@section('scripts')
  @parent
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>

  <script>
    $(function () {
      $('button[data-action=destroy]').click(function (e) {
        e.preventDefault();
        var $resourceDestroyBox = $('.resource-destroy');
        $resourceDestroyBox.find('.destroy-form').attr('action', $(this).attr('data-href'));
        $resourceDestroyBox.modal();
      });
    });
  </script>
@endsection
