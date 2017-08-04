<tr @if(isset($topCategory) && $topCategory) class="active" @endif>
  <td>
    @if(empty($topCategory)) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; @endif
    {{ $item->display_name }}
  </td>
  <td>{{ $item->name }}</td>
  <td>
    <input value="{{ $item->order }}" class="form-control" name="order[{{ $item->getKey() }}]">
  </td>
  <td>
    <a href="{{ route('admin.category.edit', ['id' => $item->getKey()]) }}" class="btn btn-link">编辑</a>
    <button class="btn btn-link" data-action="destroy"
            data-href="{{ route('admin.category.destroy', ['id' => $item->getKey()]) }}">删除</button>
  </td>
</tr>
