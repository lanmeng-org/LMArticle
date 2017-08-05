@foreach($categoryArticles as $category)
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading">
        {{ $category->display_name }}
        <div class="pull-right">
          <a href="">查看更多</a>
        </div>
      </div>
      <div class="list-group">
        @foreach(\App\Repositories\ArticleRepo::getList(5) as $item)
          <a href="{{ url('') }}" class="list-group-item">{{ $item->title }}</a>
        @endforeach
      </div>
    </div>
  </div>
@endforeach
