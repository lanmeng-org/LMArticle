<div class="form-group">
  <label for="site_name" class="col-sm-2 control-label">网站名称</label>
  <div class="col-sm-10">
    {{ Form::text('site_name', null, [
      'id' => 'site_name',
      'class' => 'form-control',
    ]) }}
  </div>
</div>

<div class="form-group">
  <label for="notice_show_home" class="col-sm-2 control-label">首页显示公告</label>
  <div class="col-sm-10">
    {{ Form::select('notice_show_home', ['隐藏', '显示'], null, [
      'id' => 'notice_show_home',
      'class' => 'form-control',
    ]) }}
  </div>
</div>

<div class="form-group">
  <label for="notice_show_number" class="col-sm-2 control-label">公告显示数量</label>
  <div class="col-sm-10">
    {{ Form::number('notice_show_number', null, [
      'id' => 'notice_show_number',
      'class' => 'form-control',
    ]) }}
  </div>
</div>

<div class="form-group">
  <label for="search_words_number" class="col-sm-2 control-label">显示搜索词数量</label>
  <div class="col-sm-10">
    {{ Form::number('search_words_number', null, [
      'id' => 'search_words_number',
      'class' => 'form-control',
    ]) }}
  </div>
</div>

<div class="form-group">
  <label for="home_category_article_number" class="col-sm-2 control-label">首页栏目文章数量</label>
  <div class="col-sm-10">
    {{ Form::text('home_category_article_number', null, [
      'id' => 'home_category_article_number',
      'class' => 'form-control',
    ]) }}
  </div>
</div>

<div class="form-group">
  <label for="article_list_number" class="col-sm-2 control-label">文章列表默认数量</label>
  <div class="col-sm-10">
    {{ Form::text('article_list_number', null, [
      'id' => 'article_list_number',
      'class' => 'form-control',
    ]) }}
  </div>
</div>

<div class="form-group">
  <label for="right_article_number" class="col-sm-2 control-label">侧边栏文章数量</label>
  <div class="col-sm-10">
    {{ Form::text('right_article_number', null, [
      'id' => 'right_article_number',
      'class' => 'form-control',
    ]) }}
  </div>
</div>

<div class="form-group">
  <label for="category_url_type" class="col-sm-2 control-label">分类URL类型</label>
  <div class="col-sm-10">
    {{ Form::select('category_url_type', \App\Models\Category::$urlTypes, null, [
      'id' => 'category_url_type',
      'class' => 'form-control',
    ]) }}
  </div>
</div>

<div class="form-group">
  <label for="footer_content" class="col-sm-2 control-label">页尾内容</label>
  <div class="col-sm-10">
    {{ Form::textarea('footer_content', null, [
      'id' => 'footer_content',
      'class' => 'form-control',
      'rows' => 3,
    ]) }}
  </div>
</div>
