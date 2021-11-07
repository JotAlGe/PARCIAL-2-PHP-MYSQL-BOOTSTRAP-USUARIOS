<?php
session_start();

// conexión
require_once 'functions/connection.php';
$conn = connection_db();

$error_message = '';
if (isset($_POST['send'])) {
  //email administrador: juan@gmail.com 
  // email usuario normal: meli@yahoo.com
  // email tecnico : antonio@hotmail.com
  //contraseña para todos: 123 

  require_once 'functions/login.php';
  $user_logged = user_data($_POST['email'], $_POST['password'], $conn);

  if (!empty($user_logged)) {

    $_SESSION['id'] = $user_logged['ID'];
    $_SESSION['name'] = $user_logged['NAME'];
    $_SESSION['last_name'] = $user_logged['LASTNAME'];

    $_SESSION['last_access'] = $user_logged['LASTACC'];

    $_SESSION['img'] = $user_logged['IMG'];
    $_SESSION['id_lev'] = $user_logged['IDLEV'];
    $_SESSION['desc_lev'] = $user_logged['DESCLEV'];

    if ($user_logged['ACTIVE'] != 1) {
      $error_message = 'Este usuario no está activo';
    } else {
      header('Location:index.php');
      exit;
    }
  } else {
    $error_message = 'Datos incorrectos!';
  }
}
?>
<!DOCTYPE html>
<?php require_once 'includes/head.inc.php'; ?>
</head>

<body>
  <section class="material-half-bg">
    <div class="cover"></div>
  </section>
  <section class="login-content">
    <div class="logo">
      <h1>Panel de administración</h1>
    </div>
    <div class="login-box ">
      <form class="login-form" method="POST">
        <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>INGRESA AL PANEL</h3>

        <?php
        if (!empty($error_message)) { ?>

          <div class="bs-component">
            <div class="alert alert-dismissible alert-danger">
              <strong><?php echo $error_message; ?></strong>
            </div>
          </div>
        <?php
        } else { ?>
          <div class="bs-component">
            <div class="alert alert-dismissible alert-info">
              <strong>Ingresa tus datos</strong>
            </div>
          </div>

        <?php
        }
        ?>
        <div class="form-group">
          <label class="control-label">USUARIO</label>
          <input class="form-control" placeholder="Email" autofocus name="email" type="text">
        </div>
        <div class="form-group">
          <label class="control-label">PASSWORD</label>
          <input class="form-control" placeholder="password" type="password" name="password">
        </div>
        <div class="form-group">
          <div class="utility">
            <p class="semibold-text mb-2"><a href="#" data-toggle="flip">Olvidaste la clave ?</a></p>
          </div>
        </div>
        <div class="form-group btn-container">
          <button class="btn btn-primary btn-block" type="submit" name="send"><i class="fa fa-sign-in fa-lg fa-fw"></i>INGRESAR</button>
        </div>
      </form>
      <form class="forget-form" method="post">
        <h3 class="login-head"><i class="fa fa-lg fa-fw fa-lock"></i>Olvidaste la clave ?</h3>
        <div class="bs-component">
          <div class="alert alert-dismissible alert-info">
            <strong>Tu clave será reseteada</strong>
          </div>
        </div>
        <!-- este es el mensaje de error-
          <div class="bs-component">
            <div class="alert alert-dismissible alert-danger">
              <strong>El mail ingresado no existe</strong>
            </div>
          </div>
         --->

        <!-- este es el mensaje de ok!
          <div class="bs-component">
            <div class="alert alert-dismissible alert-success">
              <strong>Listo! Ya puedes loguearte</strong>
            </div>
          </div>
           --------------->

        <div class="form-group">
          <label class="control-label">Ingresa tu correo</label>
          <input class="form-control" placeholder="Email">
        </div>
        <div class="form-group btn-container ">
          <button class="btn btn-primary btn-block" type='submit' name='btnResetearClave' value='dadfa'><i class="fa fa-unlock fa-lg fa-fw"></i>RESET</button>
        </div>
        <div class="form-group mt-3">
          <p class="semibold-text mb-0"><a href="#" data-toggle="flip"><i class="fa fa-angle-left fa-fw"></i> Ir al Login</a></p>
        </div>
      </form>
    </div>
  </section>
  <!-- Essential javascripts for application to work-->
  <?php require_once 'includes/footer.inc.php'; ?>