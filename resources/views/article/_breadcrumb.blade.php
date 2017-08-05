<ul class="breadcrumb">
  <li><a href="{{ url('/') }}">主页</a></li>
  @if($category->parentCategory)
  <li>
    <a href="{{ \App\Repositories\CategoryRepo::generateUrl($category->parentCategory) }}">
      {{ $category->parentCategory->display_name }}
    </a>
  </li>
  @endif
  <li>
    <a href="{{ \App\Repositories\CategoryRepo::generateUrl($category) }}">
      {{ $category->display_name }}
    </a>
  </li>
  <li class="active">{{ $article->title }}</li>
</ul>
