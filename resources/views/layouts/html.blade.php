<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  @section('metas')
    <meta name="HandheldFriendly" content="True">
    <meta name="apple-touch-fullscreen" content="yes" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <meta name="format-detection" content="telephone=no" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1, maximum-scale=1.0, user-scalable=no">
  @show

  <title>@yield('title')</title>

  @yield('styles')
</head>

<body class="@yield('body-class')">
  @yield('header')
  @yield('body')
  @yield('layers')
  @yield('footer')

  @section('scripts')
    <script src="{{ asset('vendor/jquery/jquery-1.9.1.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>

    <script>
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }
      });

      $.extend(app, {
        url: function(path) {
          return '{{ url('/') }}' + path;
        },

        asset: function(path) {
          var url = '{{ asset('') }}';

          if (url.endsWith('/')) {
            return url + path;
          } else {
            return url + '/' + path;
          }
        },
      });
    </script>
  @show
</body>
