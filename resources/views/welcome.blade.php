<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">

      <title>{{ config('app.name', 'Laravel') }}Welcome</title>

      <!-- Fonts -->
      <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

      <!-- Styles -->
      <style>

         body {

            /* Ubicación de la imagen */

            background-image: url(/images/fondo-2-.jpg);

            /* Para dejar la imagen de fondo centrada, vertical y

            horizontalmente */

            background-position: center center;

            /* Para que la imagen de fondo no se repita */

            background-repeat: no-repeat;

            /* La imagen se fija en la ventana de visualización para que la altura de la imagen no supere a la del contenido */

            background-attachment: fixed;

            /* La imagen de fondo se reescala automáticamente con el cambio del ancho de ventana del navegador */

            background-size: cover;

            /* Se muestra un color de fondo mientras se está cargando la imagen

            de fondo o si hay problemas para cargarla */

            background-color: #66999;

         }



         html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
         }

         .full-height {
            height: 100vh;
         }

         .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
         }

         .position-ref {
            position: relative;
         }

         .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
         }

         .content {
            text-align: center;
         }

         .title {
            font-size: 120px;
            font-weight:100;
            text-shadow: black 0.1em 0.1em 0.2em;
         }

         .links > a {
            color: #fafafa;
            padding: 0 25px;
            font-size: 16px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
            text-shadow: black 0.1em 0.1em 0.2em;
         }

         .m-b-md {
            margin-bottom: 30px;
         }
      </style>
   </head>
   <body>
      <div class="flex-center position-ref full-height" style="color:#fafafa">
         @if (Route::has('login'))
         <div class="top-right links" >
            @auth
            <a href="{{ url('/home') }}" >Home</a>
            @else
            <a href="{{ route('login') }}" >Login</a>

            @if (Route::has('register'))
            <!--<a href="{{ route('register') }}" >Register</a>-->
            @endif
            @endauth
         </div>
         @endif

         <div class="content">
            <div class="title m-b-md">
               {{ config('app.name', 'Laravel') }}
            </div>

            <!-- <div class="links">
<a href="https://laravel.com/docs">Documentation</a>
<a href="https://laracasts.com">Laracasts</a>
<a href="https://laravel-news.com">News</a>
<a href="https://nova.laravel.com">Nova</a>
<a href="https://forge.laravel.com">Forge</a>
<a href="https://github.com/laravel/laravel">GitHub</a>
</div>-->
         </div>
      </div>
   </body>
</html>
