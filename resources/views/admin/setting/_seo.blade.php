<div class="form-group">
  <label for="site_name" class="col-sm-2 control-label">可用变量</label>
  <div class="col-sm-10">
    <p>
      <span class="text-danger">{$site.name$}</span> 表示网站名称, 可在所有页面显示
    </p>
    <p>
      <span class="text-danger">{$category.display_name$}</span> 表示栏目名称, 只可在栏目页使用
    </p>
    <p>
      <span class="text-danger">{$article.title}</span> 表示文章名称, 只可在文章页使用
    </p>
  </div>
</div>


<div class="form-group">
  <label for="site_title_home" class="col-sm-2 control-label">首页标题</label>
  <div class="col-sm-10">
    {{ Form::text('site_title_home', null, [
      'id' => 'site_title_home',
      'class' => 'form-control',
    ]) }}
  </div>
</div>

<div class="form-group">
  <label for="site_key_home" class="col-sm-2 control-label">首页关键词</label>
  <div class="col-sm-10">
    {{ Form::text('site_key_home', null, [
      'id' => 'site_key_home',
      'class' => 'form-control',
    ]) }}
  </div>
</div>

<div class="form-group">
  <label for="site_description_home" class="col-sm-2 control-label">首页描述</label>
  <div class="col-sm-10">
    {{ Form::text('site_description_home', null, [
      'id' => 'site_description_home',
      'class' => 'form-control',
    ]) }}
  </div>
</div>

<div class="form-group">
  <label for="site_title_category" class="col-sm-2 control-label">栏目页标题</label>
  <div class="col-sm-10">
    {{ Form::text('site_title_category', null, [
      'id' => 'site_title_category',
      'class' => 'form-control',
    ]) }}
  </div>
</div>

<div class="form-group">
  <label for="site_key_category" class="col-sm-2 control-label">栏目页关键词</label>
  <div class="col-sm-10">
    {{ Form::text('site_key_category', null, [
      'id' => 'site_key_category',
      'class' => 'form-control',
    ]) }}
  </div>
</div>

<div class="form-group">
  <label for="site_description_category" class="col-sm-2 control-label">栏目页描述</label>
  <div class="col-sm-10">
    {{ Form::text('site_description_category', null, [
      'id' => 'site_description_category',
      'class' => 'form-control',
    ]) }}
  </div>
</div>

<div class="form-group">
  <label for="site_title_article" class="col-sm-2 control-label">文章页标题</label>
  <div class="col-sm-10">
    {{ Form::text('site_title_article', null, [
      'id' => 'site_title_article',
      'class' => 'form-control',
    ]) }}
  </div>
</div>

<div class="form-group">
  <label for="site_key_article" class="col-sm-2 control-label">文章页关键词</label>
  <div class="col-sm-10">
    {{ Form::text('site_key_article', null, [
      'id' => 'site_key_article',
      'class' => 'form-control',
    ]) }}
  </div>
</div>

<div class="form-group">
  <label for="site_description_article" class="col-sm-2 control-label">文章页描述</label>
  <div class="col-sm-10">
    {{ Form::text('site_description_article', null, [
      'id' => 'site_description_article',
      'class' => 'form-control',
    ]) }}
  </div>
</div>
