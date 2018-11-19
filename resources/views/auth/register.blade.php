<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   @include('includes.head')
   <body class="hold-transition register-pageE">
      @include('includes.nav-logout')
      <div class="container">
         <div class="row justify-content-center">
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
               .card {
                  opacity: 0.9;
               }
            </style>
            <div class="col-md-8">
               <br/>
               <br/>
               <br/>
               <br/>
               <br/>
               <div class="card">
                  <div class="card-header">{{ __('Register') }}</div>

                  <div class="card-body">
                     <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                           <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                           <div class="col-md-6">
                              <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                              @if ($errors->has('name'))
                              <span class="invalid-feedback" role="alert">
                                 <strong>{{ $errors->first('name') }}</strong>
                              </span>
                              @endif
                           </div>
                        </div>

                        <div class="form-group row">
                           <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                           <div class="col-md-6">
                              <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                              @if ($errors->has('email'))
                              <span class="invalid-feedback" role="alert">
                                 <strong>{{ $errors->first('email') }}</strong>
                              </span>
                              @endif
                           </div>
                        </div>

                        <div class="form-group row">
                           <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                           <div class="col-md-6">
                              <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                              @if ($errors->has('password'))
                              <span class="invalid-feedback" role="alert">
                                 <strong>{{ $errors->first('password') }}</strong>
                              </span>
                              @endif
                           </div>
                        </div>

                        <div class="form-group row">
                           <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                           <div class="col-md-6">
                              <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                           </div>
                        </div>

                        <div class="form-group row mb-0">
                           <div class="col-md-6 offset-md-4">
                              <button type="submit" class="btn btn-primary">
                                 {{ __('Register') }}
                              </button>
                           </div>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </body>
</html>

