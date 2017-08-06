@extends('admin.layouts.main')

@section('title')
  分类管理
@endsection

@section('pageHeader')
  <h2 class="page-header">
    分类管理

    <div class="pull-right">
      <a href="{{ route('admin.category.create') }}" class="btn btn-info">新增分类</a>
      <button type="button" class="btn btn-primary update-order">更新排序</button>
    </div>
  </h2>
@endsection

@section('content')
  @include('widgets.tips')

  {{ Form::open(['route' => 'admin.category.sort', 'class' => 'update-other']) }}
  <table class="table table-condensed table-vertical-align-middle">
    <thead>
    <tr>
      <th>显示名称</th>
      <th>标识名称</th>
      <th width="100">排序</th>
      <th width="140">操作</th>
    </tr>
    </thead>
    <tbody>
      @foreach($data as $item)
        @include('admin.category.item', ['item' => $item, 'topCategory' => true])

        @foreach($item->childCategory as $category)
          @include('admin.category.item', ['item' => $category])
        @endforeach
      @endforeach
    </tbody>
  </table>
  {{ Form::close() }}
@endsection

@section('scripts')
  @parent
  <script>
    $('.update-order').click(function () {
      $('form.update-other').submit();
    })
  </script>
@endsection
