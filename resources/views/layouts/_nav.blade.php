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
      <a class="navbar-brand" href="{{ route('admin.dashboard') }}">{{ config('site.name') }}</a>
    </div>

    <div class="collapse navbar-collapse" id="admin-nav-collapse">
      <ul class="nav navbar-nav">
        @foreach($categories->where('show_nav', 1) as $category)
          <li>
            <a href="{{ url("category/{$category->id}") }}">{{ $category->display_name }}</a>
          </li>
        @endforeach
      </ul>
    </div>
  </div>
</nav>
