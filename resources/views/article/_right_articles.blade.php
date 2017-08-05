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

<div class="panel panel-success">
  <div class="panel-heading">
    更多推荐
  </div>
  <div class="list-group">
    <a href="" class="list-group-item">
      大大大大大大大大大大大
    </a>
  </div>
</div>
