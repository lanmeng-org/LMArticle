<nav class="navbar navbar-default">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
              data-target="#admin-nav-collapse" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="{{ route('admin.dashboard') }}">{{ setting('site_name') }}</a>
    </div>

    <div class="collapse navbar-collapse" id="admin-nav-collapse">
      <ul class="nav navbar-nav">
        <li>
          <a href="{{ route('admin.dashboard') }}">仪表盘</a>
        </li>
        <li>
          <a href="{{ route('admin.category.index') }}">分类管理</a>
        </li>
        <li>
          <a href="{{ route('admin.article.index') }}">文章管理</a>
        </li>
        <li>
          <a href="{{ route('admin.notice.index') }}">公告管理</a>
        </li>
        <li>
          <a href="{{ route('admin.setting.edit') }}">系统设置</a>
        </li>
      </ul>

      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            {{ Auth::user()->name }} <span class="caret"></span>
          </a>

          <ul class="dropdown-menu">
            <li>
              <a href="{{ route('admin.profile.edit') }}">修改资料</a>
            </li>
            <li role="separator" class="divider"></li>
            <li>
              <a href="{{ route('logout') }}">退出登录</a>
            </li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
