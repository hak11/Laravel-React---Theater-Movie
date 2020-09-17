<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Abdul Jabar Hakim">
    <title>TesTheater</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      body {
        padding-top: 3rem;
        padding-bottom: 3rem;
        color: #5a5a5a;
      }


      .carousel {
        margin-bottom: 4rem;
      }
      .carousel-caption {
        bottom: 3rem;
        z-index: 10;
      }

      .carousel-item {
        height: 32rem;
      }
      .carousel-item > img {
        position: absolute;
        top: 0;
        left: 0;
        min-width: 100%;
        height: 32rem;
      }


      .divider {
        margin: 5rem 0; /* Space out the Bootstrap <hr> more */
      }

      .seats {
        width: 20px;
        height: 20px;
        background-color: #5a5a5a;
      }
      .seats-active {
        width: 20px;
        height: 20px;
        background-color: chartreuse
      }

    </style>

  </head>
  <body>
    @include('layouts.header')
    <main role="main">
      @yield('content')
    </main>
    @stack('script-footer')
  </body>
</html>
