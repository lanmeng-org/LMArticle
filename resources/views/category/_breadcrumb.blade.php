<ul class="breadcrumb">
  <li><a href="{{ url('/') }}">主页</a></li>
  @if($category->parentCategory)
  <li>
    <a href="{{ \App\Repositories\CategoryRepo::generateUrl($category->parentCategory) }}">
      {{ $category->parentCategory->display_name }}
    </a>
  </li>
  @endif
  <li class="active">{{ $category->display_name }}</li>
</ul>
