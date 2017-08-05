@if($category->childCategory)
  <div class="panel panel-default">

    <div class="panel-heading">
      子分类
    </div>

    <div class="panel-body">
      @foreach($category->childCategory as $item)
        <a href="{{ \App\Repositories\CategoryRepo::generateUrl($item) }}"
           class="btn btn-default">
          {{ $item->display_name }}
        </a>
      @endforeach
    </div>
  </div>
@endif
