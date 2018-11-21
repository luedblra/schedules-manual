<head>
   <meta charset="utf-8">
   <!-- CSRF Token -->
   <meta name="csrf-token" content="{{ csrf_token() }}">
   <title>
      M.S | @yield('title')
   </title>
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta http-equiv="x-ua-compatible" content="ie=edge">
   @section('js-superior')
   <!-- Scripts -->
   {{--<script src="{{ asset('js/app.js') }}" ></script>--}}
   @show
   <!-- Fonts -->
   @section('css')

   <link href="{{ asset('css/app.css') }}" rel="stylesheet">
   <!-- Font Awesome Icons -->
   <!--<link rel="stylesheet" href="/AdminLTE/plugins/font-awesome/css/font-awesome.min.css">-->
   <link href="/icon/fontawesome/css/all.css" rel="stylesheet">
   <!-- Ionicons -->
   <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
   <!-- Theme style -->
   
   <link rel="stylesheet" href="/AdminLTE/plugins/iCheck/flat/blue.css">
   <link rel="stylesheet" href="/AdminLTE/dist/css/adminlte.min.css">
   <link rel="dns-prefetch" href="https://fonts.gstatic.com">
   <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

   <!-- Styles -->
   @show
</head>