@extends('admin.layouts.main')

@section('title')
  广告管理
@endsection

@section('pageHeader')
  <h2 class="page-header">
    广告管理
    <span class="pull-right">
      <a href="{{ route('admin.advert.create') }}" class="btn btn-info">新增广告</a>
    </span>
  </h2>
@endsection

@section('content')
  <table class="table table-condensed table-striped table-vertical-align-middle">
    <thead>
    <tr>
      <th>广告名称</th>
      <th>状态</th>
      <th width="150">发布时间</th>
      <th width="150">更新时间</th>
      <th width="140">操作</th>
    </tr>
    </thead>
    <tbody>
      @foreach($data as $item)
        <tr>
          <td>{{ $item->name }}</td>
          <td>{{ $item->status ? '启用' : '禁用' }}</td>
          <td>{{ $item->created_at }}</td>
          <td>{{ $item->updated_at }}</td>
          <td>
            <a href="{{ route('admin.advert.edit', ['id' => $item->getKey()]) }}" class="btn btn-link">编辑</a>
            <button class="btn btn-link" data-action="destroy"
                    data-href="{{ route('admin.advert.destroy', ['id' => $item->getKey()]) }}">删除</button>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
@endsection
