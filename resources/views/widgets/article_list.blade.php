<div class="article-list-box">
  @if($articles->isEmpty())
    <div class="article-list-empty">暂无相关内容</div>
    @include('widgets.search_words')
  @else
    <div class="panel panel-default">
      <div class="panel-heading"></div>
      <div class="list-group">
        @foreach($articles as $item)
          <a href="{{ route('article.show', ['id' => $item->getKey()]) }}" class="list-group-item">
            {{ $item->title }}
          </a>
        @endforeach
      </div>
    </div>
  @endif
</div>
