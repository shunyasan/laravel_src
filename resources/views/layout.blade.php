<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    <title>@yield('title')</title>
  </head>
  <body>
    <header>
      @include('header')
    </header>
    <main>
      @yield('content')
    </main>
    <footer>
      @include('footer')
    </footer>
  </body>
</html>
