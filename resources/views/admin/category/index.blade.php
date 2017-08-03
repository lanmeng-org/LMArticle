@extends('admin.layouts.main')

@section('title')
  分类管理
@endsection

@section('content')
  <div class="row">
    <div class="pull-right">
      <a href="{{ route('admin.category.create') }}" class="btn btn-info">新增</a>
    </div>

    <table class="table table-striped">
      <thead>
      <tr>
        <th>#</th>
        <th>标识名称</th>
        <th>显示名称</th>
        <th>排序</th>
        <th width="140">操作</th>
      </tr>
      </thead>
      <tbody>
        @foreach($data as $item)
          <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->display_name }}</td>
            <td>{{ $item->order }}</td>
            <td>
              <a href="{{ route('admin.category.edit', ['id' => $item->getKey()]) }}" class="btn btn-sm btn-primary">编辑</a>
              <button class="btn btn-sm btn-danger" data-action="destroy"
                      data-href="{{ route('admin.category.destroy', ['id' => $item->getKey()]) }}">删除</button>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection
