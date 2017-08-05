<ul class="breadcrumb">
  <li><a href="{{ url('/') }}">主页</a></li>
  <li>
    <a href="{{ route('notice.index') }}">公告</a>
  </li>
  <li class="active">{{ $notice->title }}</li>
</ul>
