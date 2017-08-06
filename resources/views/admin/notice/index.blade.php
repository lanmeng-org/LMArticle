@extends('admin.layouts.main')

@section('title')
  公告管理
@endsection

@section('pageHeader')
  <h2 class="page-header">
    公告管理

    <div class="pull-right">
      <a href="{{ route('admin.notice.create') }}" class="btn btn-info">新增公告</a>
    </div>
  </h2>
@endsection

@section('content')
  <table class="table table-condensed table-striped table-vertical-align-middle">
    <thead>
    <tr>
      <th>标题</th>
      <th width="150">发布时间</th>
      <th width="150">更新时间</th>
      <th width="140">操作</th>
    </tr>
    </thead>
    <tbody>
      @foreach($data as $item)
        <tr>
          <td>{{ $item->title }}</td>
          <td>{{ $item->created_at }}</td>
          <td>{{ $item->updated_at }}</td>
          <td>
            <a href="{{ route('admin.notice.edit', ['id' => $item->getKey()]) }}" class="btn btn-link">编辑</a>
            <button class="btn btn-link" data-action="destroy"
                    data-href="{{ route('admin.notice.destroy', ['id' => $item->getKey()]) }}">删除</button>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
@endsection
