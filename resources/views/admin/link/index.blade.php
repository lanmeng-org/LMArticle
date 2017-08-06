@extends('admin.layouts.main')

@section('title')
  友情链接管理
@endsection

@section('pageHeader')
  <h2 class="page-header">
    友情链接管理

    <div class="pull-right">
      <a href="{{ route('admin.link.create') }}" class="btn btn-info">新增链接</a>
    </div>
  </h2>
@endsection

@section('content')
  <div class="row">
    <table class="table table-condensed table-striped table-vertical-align-middle">
      <thead>
      <tr>
        <th>标题</th>
        <th>链接</th>
        <th width="150">添加时间</th>
        <th width="150">更新时间</th>
        <th width="140">操作</th>
      </tr>
      </thead>
      <tbody>
        @foreach($data as $item)
          <tr>
            <td>{{ $item->title }}</td>
            <td>{{ $item->link }}</td>
            <td>{{ $item->created_at }}</td>
            <td>{{ $item->updated_at }}</td>
            <td>
              <a href="{{ route('admin.link.edit', ['id' => $item->getKey()]) }}" class="btn btn-link">编辑</a>
              <button class="btn btn-link" data-action="destroy"
                      data-href="{{ route('admin.link.destroy', ['id' => $item->getKey()]) }}">删除</button>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection
