@foreach($categoryArticles as $category)
  <div class="col-md-{{ $category->show_column }}">
    <div class="panel panel-{{ \App\Repositories\CategoryRepo::getHomeColumnCss($category) }}">
      <div class="panel-heading">
        {{ $category->display_name }}
        <div class="pull-right view-more">
          <a href="{{ \App\Repositories\CategoryRepo::generateUrl($category) }}">查看更多</a>
        </div>
      </div>
      <div class="list-group">
        <?php
        $categoryArticleNumber = setting('home_category_article_number');
        $currCategoryArticles = \App\Repositories\ArticleRepo::getList($category);
        ?>
        @foreach(\App\Repositories\ArticleRepo::getList($category, $categoryArticleNumber) as $item)
          <a href="{{ route('article.show', ['id' => $item->getKey()]) }}" class="list-group-item">
            {{ $item->title }}
          </a>
        @endforeach
      </div>
    </div>
  </div>
@endforeach
