<div class="container">
  <form action="{{ route('search') }}" method="get" class="col-md-8 col-lg-6 form-search-bar center-block">
    <div class="input-group">
      <input type="text" class="form-control" name="words" value="" placeholder="输入搜索内容">
      <span class="input-group-btn">
          <button class="btn btn-default" type="submit">搜索</button>
        </span>
    </div>
  </form>
</div>
