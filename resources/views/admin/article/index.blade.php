@extends('admin.layouts.main')

@section('title')
  文章管理
@endsection

@section('content')
  <div class="row">
    <div class="pull-right">
      <a href="{{ route('admin.article.create') }}" class="btn btn-info">新增文章</a>
    </div>

    <table class="table table-condensed table-striped table-vertical-align-middle">
      <thead>
      <tr>
        <th>标题</th>
        <th>分类</th>
        <th width="150">发布时间</th>
        <th width="150">更新时间</th>
        <th width="140">操作</th>
      </tr>
      </thead>
      <tbody>
        @foreach($data as $item)
          <tr>
            <td>{{ $item->title }}</td>
            <td>{{ $item->category ? $item->category->display_name : '无效分类' }}</td>
            <td>{{ $item->created_at }}</td>
            <td>{{ $item->updated_at }}</td>
            <td>
              <a href="{{ route('admin.article.edit', ['id' => $item->getKey()]) }}" class="btn btn-link">编辑</a>
              <button class="btn btn-link" data-action="destroy"
                      data-href="{{ route('admin.article.destroy', ['id' => $item->getKey()]) }}">删除</button>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection
