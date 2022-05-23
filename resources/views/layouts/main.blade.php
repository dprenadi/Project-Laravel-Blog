<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    {{-- Bootstrap Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

    {{-- Sign in Style --}}
    <link rel="stylesheet" href="/css/signin.css">

    <script src="https://unpkg.com/feather-icons"></script>

    {{-- TRIX EDITOR --}}
    <link rel="stylesheet" type="text/css" href="/css/trix.css">
    <script type="text/javascript" src="/js/trix.js"></script>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">

    <!-- Template Ninestars CSS File -->
    <link href="/css/ninestars.css" rel="stylesheet">
    <!-- Template Main JS File -->
    <script src="/js/ninestars.js"></script>

    <!-- Template Sidebars CSS File -->
    <link href="/css/sidebars.css" rel="stylesheet">
    <!-- Template Main JS File -->
    <script src="/js/sidebars.js"></script>

    <!-- Template Dashboard CSS and JS file -->
    <link href="/css/dashboard.css" rel="stylesheet">
    <script src="/js/dashboard.js"></script>

    <style>
      trix-toolbar [data-trix-button-group="file-tools"] {
            display: none;
      }
    </style>

    <title>{{ $title }}</title>
  </head>
  <body>
    
    @include('layouts.header')
    {{-- @include('partials.navbar') --}}
    

    <div class="container-fluid">
      <div class="row">
        {{-- <div class="col-lg-3 d-flex align-items-center justify-content-center">
            @include('layouts.sidebar')
        </div> --}}
        @include('layouts.sidebar')

        <div class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
          <main>
            @yield('container')
          </main>
        </div>
    </div>
    </div>

    {{-- <main id="main">
    <div class="container-fluid mt-5">
        @yield('container')
    </div>
    </main> --}}

    

    {{-- <div class="container mt-2">
        @yield('container')
    </div> --}}

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script>
      feather.replace()
    </script>

  </body>
</html>