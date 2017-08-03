@extends('admin.layouts.main')

@section('title')
  分类管理
@endsection

@section('content')
  <div class="row">
    <div class="pull-right">
      <a href="{{ route('admin.category.create') }}" class="btn btn-info">新增</a>
    </div>

    <table class="table table-vertical-align-middle">
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
          <tr class="active">
            <td>{{ $item->display_name }}</td>
            <td>{{ $item->name }}</td>
            <td>
              <input type="text" value="{{ $item->order }}" class="form-control">
            </td>
            <td>
              <a href="{{ route('admin.category.edit', ['id' => $item->getKey()]) }}" class="btn btn-link">编辑</a>
              <button class="btn btn-link" data-action="destroy"
                      data-href="{{ route('admin.category.destroy', ['id' => $item->getKey()]) }}">删除</button>
            </td>
          </tr>

          @foreach($item->subCategory as $category)
            <tr>
              <td>&nbsp;&nbsp;&nbsp;&nbsp;
                {{ $category->display_name }}
              </td>
              <td>{{ $category->name }}</td>
              <td>
                <input type="text" value="{{ $category->order }}" class="form-control">
              </td>
              <td>
                <a href="{{ route('admin.category.edit', ['id' => $category->getKey()]) }}" class="btn btn-link">编辑</a>
                <button class="btn btn-link" data-action="destroy"
                        data-href="{{ route('admin.category.destroy', ['id' => $category->getKey()]) }}">删除</button>
              </td>
            </tr>
          @endforeach

        @endforeach
      </tbody>
    </table>
  </div>
@endsection
