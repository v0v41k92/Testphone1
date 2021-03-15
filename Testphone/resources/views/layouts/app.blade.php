<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>@yield('title-block')</title>
  <link rel="stylesheet" href="/css/bootstrap.min.css">
  <link rel="stylesheet" href="/css/app.css">
  <link rel="stylesheet" href="/css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
</head>
<body>
  @include('inc.header')

  @if(Request::is('/'))

  @endif
<div class="container mt-5">
  @include('inc.messages')

  <div class="row">
    <div class="content">
      @yield('content')
    </div>
  </div>
</div>

  @include('inc.footer')

<script src="js/jquery-3.5.1.min.js"></script>
<script src="/js/app.js" ></script>
<script src="/js/tabs_click-to-activate.js" ></script>
<script src="/js/tabs.js" ></script>
</body>
</html>
