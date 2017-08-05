<footer>
  <div class="container">
    <div class="pull-right">
      <a href="#top">返回顶部</a>
    </div>
    <div>
      {!! setting('footer_content') !!}
    </div>
    <div>
      本站 <a href="{{ url('/') }}" rel="nofollow">{{ setting('site_name') }}</a>
      由 <a href="http://www.lanmeng.org" target="_blank">蓝梦网络</a> 开发的文章发布系统搭建.
      基于 PHP / Bootstrap / Cerulean Theme 等技术.
    </div>
  </div>
</footer>
