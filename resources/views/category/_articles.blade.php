<div class="panel panel-default">

  <div class="panel-heading">
    {{ $category->display_name }}
  </div>

  <div class="list-group">
    @foreach($articles as $item)
      <a href="{{ route('article.show', ['id' => $item->getKey()]) }}" class="list-group-item">
        {{ $item->title }}
      </a>
    @endforeach
  </div>

  @if($articles->lastPage() > 1)
    <div class="pagination pull-right clearfix">
      {{ $articles->links() }}
    </div>
  @endif
</div>
