@if(setting('notice_show_home'))
  <div class="col-md-12">
    <div class="panel panel-primary">
      <div class="panel-heading">
        公告
        <div class="pull-right view-more">
          <a href="{{ route('notice.index') }}">查看更多</a>
        </div>
      </div>
      <div class="list-group">
        @foreach(\App\Repositories\NoticeRepo::getList() as $item)
          <a href="{{ route('notice.show', ['id' => $item->getKey()]) }}" class="list-group-item">
            {{ $item->title }}
          </a>
        @endforeach
      </div>
    </div>
  </div>
@endif
