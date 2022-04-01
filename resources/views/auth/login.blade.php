<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Otawin</title>
  <!-- Fuente de botones google -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Passion+One&family=Roboto:wght@300&display=swap" rel="stylesheet">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="/css/estilos_login.css">
</head>
<body class="hold-transition login-page">
<div  class="login-box">
  <!-- /.login-logo -->
  <div id="login-card" class="card card-outline card-primary">
    <div class="card-header text-center">
      <img src="vendor/adminlte/dist/img/otawin2.png" alt="otawin" srcset="">
    </div>
    <div class="card-body">
      <p id="welcome" class="login-box-msg"><b class="botilyn">Botilyn:</b> Hola, Bienvenido al sistema de autenticacion Otawin</p>

      <form action="{{ route ('login') }}" method="post">
          @csrf
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="juan" value="{{old('email')}}" name="email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <!-- Mensaje de validacion -->
        @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <!-- Fin de mensaje -->
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" value="{{old('password')}}" name="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <!-- Mensaje de validacion -->
        @error('password')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <!-- Fin de mensaje de validacion -->
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Recuerdame
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div id="content-ingresar" class="mt-3 mb-1">
            <button type="submit" class="btn-ingresar">Ingresar</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="social-auth-links text-center mt-2 mb-3">
        <a href="#" id="btn-fb" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Ingresa con Facebook
        </a>
        <a href="#" id="btn-google" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Ingresa con Google+
        </a>
      </div>
      <!-- /.social-auth-links -->

      <p class="mb-1" id="content-forgot">
        <a id="forgot" href="/forgot-password"><b>No recuerdo mi contraseña</b></a>
      </p>
      
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="/dist/js/adminlte.min.js"></script>
</body>
</html>
