@if(!$category->childCategory->isEmpty())
  <div class="panel panel-success">
    <div class="panel-heading">
      子分类
    </div>

    <div class="list-group child-categories">
      @foreach($category->childCategory as $item)
        <a href="{{ \App\Repositories\CategoryRepo::generateUrl($item) }}" class="list-group-item">
          {{ $item->display_name }}
        </a>
      @endforeach
    </div>
  </div>
@endif

<div class="panel panel-primary">
  <div class="panel-heading">
    小编推荐
  </div>

  <div class="list-group">
    @foreach(\App\Repositories\ArticleRepo::getPositionList([4,2], $category) as $item)
      <a href="{{ route('article.show', ['id' => $item->getKey()]) }}" class="list-group-item">
        {{ $item->title }}
      </a>
    @endforeach
  </div>
</div>

<div class="panel panel-warning">
  <div class="panel-heading">
    热门文章
  </div>

  <div class="list-group">
    @foreach(\App\Repositories\ArticleRepo::getHotList($category) as $item)
      <a href="{{ route('article.show', ['id' => $item->getKey()]) }}" class="list-group-item">
        {{ $item->title }}
      </a>
    @endforeach
  </div>
</div>

