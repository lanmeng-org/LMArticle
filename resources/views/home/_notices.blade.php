@if(setting('notice_show_home'))
  <div class="col-md-12">
    <div class="panel panel-primary">
      <div class="panel-heading">公告</div>
      <div class="list-group">
        @foreach(\App\Repositories\NoticeRepo::getList() as $item)
          <a href="{{ url('') }}" class="list-group-item">{{ $item->title }}</a>
        @endforeach
      </div>
    </div>
  </div>
@endif
