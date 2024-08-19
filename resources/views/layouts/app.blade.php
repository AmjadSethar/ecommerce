<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    <meta name="description" content="@yield('meta_description')">
    <meta name="keywords" content="@yield('meta_keyword')">
    <meta name="author" content="E-com">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" rel="stylesheet">
    
    <!-- Styles -->
    <link href="{{ url('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ url('css/custome.css') }}" rel="stylesheet">
    
    {{-- Owl Carousal --}}
    <link href="{{ url('css/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ url('css/owl.theme.default.min.css') }}" rel="stylesheet">

    {{-- Exzoom product image --}}
    <link href="{{ url('exzoom/jquery.exzoom.css') }}" rel="stylesheet">

    <!-- CSS -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
<!-- Default theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
    
   

    @livewireStyles
</head>
<body>
    <div id="app">
        @include('layouts.inc.frontend.navbar')
    </main>
            @yield('content')
    
        @include('layouts.inc.frontend.footer')    
            
    </div>
      <!-- Scripts -->
      <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
      <script src="{{ url('js/jquery-3.6.0.min.js') }}" defer></script> 
      <script src="{{ url('js/bootstrap.bundle.min.js') }}" defer></script>
      
      <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
      <script>
        window.addEventListener('message', evene =>[
            alertify.set('notifier','position', 'top-center'),
            alertify.notify(event.detail.text,event.detail.type)
        ]);
          
      </script>
       <script defer src="{{ url('js/owl.carousel.min.js') }}"></script>

       <script defer src="{{ url('exzoom/jquery.exzoom.js') }}"></script>
       
       @yield('script')
    @livewireScripts
    @stack('scripts')
</body>
</html>
