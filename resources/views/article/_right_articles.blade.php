<div class="panel panel-primary">
  <div class="panel-heading">
    小编推荐
  </div>
  <div class="list-group">
    @foreach(\App\Repositories\ArticleRepo::getPositionList([4,2,1], $category) as $item)
      <a href="{{ route('article.show', ['id' => $item->getKey()]) }}" class="list-group-item">
        {{ $item->title }}
      </a>
    @endforeach
  </div>
</div>

<div class="panel panel-warning">
  <div class="panel-heading">
    热门资源
  </div>
  <div class="list-group">
    @foreach(\App\Repositories\ArticleRepo::getHotList() as $item)
      <a href="{{ route('article.show', ['id' => $item->getKey()]) }}" class="list-group-item">
        {{ $item->title }}
      </a>
    @endforeach
  </div>
</div>
