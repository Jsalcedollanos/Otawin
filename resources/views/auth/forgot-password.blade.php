<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Otawin || Forgot</title>

  <link href="https://fonts.googleapis.com/css2?family=Passion+One&family=Roboto:wght@100;300&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/css/estilos_login.css">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div id="forgot-card" class="card card-outline card-primary">
    <div class="card-header text-center">
      <img src="vendor/adminlte/dist/img/otawin2.png" alt="otawin" srcset="">
    </div>
    <div class="card-body">
      <p id="welcome" class="login-box-msg"><b class="botilyn"> Botilyn:</b> No recuerdas tu contraseña?, digitala y te ayudare a recuperarla!</p>
      <form action="{{ route ('password.email')}}" method="post">
          @csrf
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="juan@gmail.com" value="{{ old('email')}}" name="email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div id="content-btn" >
          <div id="content-btn2">
            <button class="btn-ingresar" type="submit">Recuperar Contraseña</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <p class="mt-3 mb-1">
        <a href="/login">Ingresar</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
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
