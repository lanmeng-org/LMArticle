<div class="panel panel-default">
  <div class="panel-heading">
    <span class="panel-title">热门搜索</span>
  </div>
  <div class="panel-body">
    <ul class="list-inline">
      @foreach(\App\Repositories\SearchWordRepo::getList() as $word)
        <li>
          <a href="{{ url('search?words='. urlencode($word->word)) }}">{{ $word->word }}</a>
        </li>
      @endforeach
    </ul>
  </div>
</div>
