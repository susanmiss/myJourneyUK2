<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} @yield('meta_title')</title>
    <meta name="description" content="@yield('meta_description')">

    <!-- Styles -->
    <!-- <link href="{{ asset('css/all.css') }}" rel="stylesheet"> -->
    <link href="{{ asset('/css/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Italianno|Rock+Salt&display=swap" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        @include('layouts.nav')
        <main class="py-4">
            @yield('content')
        </main>
        @include('emails.contact')
        @include('layouts.footer')
    </div>





    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
      <!-- Bootstrap core JavaScript -->
      <script src="{{ asset('/js/jquery/jquery.min.js')}}"></script>
      <script src="{{ asset('/js/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

      <!-- Plugin JavaScript -->
      <script src="{{ asset('/js/jquery-easing/jquery.easing.min.js')}}"></script>


      <!-- Contact form JavaScript -->
      <script src="{{ asset('/js/jqBootstrapValidation.js')}}"></script>
      <script src="{{ asset('/js/contact_me.js')}}"></script>


      <!-- Custom scripts for this template -->
      <script src="{{ asset('/js/agency.min.js')}}"></script>

</body>
</html>
