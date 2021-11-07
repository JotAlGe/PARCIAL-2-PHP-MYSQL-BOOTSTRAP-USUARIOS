<?php
session_start();
if (empty($_SESSION['name'])) {
  header("Location: logout.php");
  exit;
}

// conexión
require_once 'functions/connection.php';
$conn = connection_db();
// archivo de validación
require_once 'functions/validation.php';

// archivo de inserción de incidencias
require_once 'functions/insert_incidents.php';

// mensajes a mostrar
$error_message = '';
$ok_message = '';


if (isset($_POST['register'])) {
  $error_message = validate_data();
  if (empty($error_message)) {
    if (insert_incidents($conn) != false) {
      $ok_message = 'Se ha registrado correctamente.';
      $_POST = array();
    }
  }
}
?>

<?php require_once 'includes/head.inc.php'; ?>
</head>

<body class="app sidebar-mini">
  <!-- Navbar-->
  <?php require_once 'includes/header.inc.php'; ?>
  <!-- Sidebar menu-->
  <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
  <?php require_once 'includes/aside.inc.php'; ?>
  <!-- fin Sidebar menu-->
  <main class="app-content">
    <div class="app-title">
      <div>
        <h1><i class="fa fa-edit"></i> Registra aqui tu incidencia</h1>
        <p>Detalla lo mas que puedas el problema que se presenta</p>
      </div>
      <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item">Inicio</li>
        <li class="breadcrumb-item"><a href="carga.php">Registro</a></li>
      </ul>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="tile">
          <h3 class="tile-title">Ingresa los datos solicitados</h3>
          <?php
          if (!empty($error_message)) { ?>
            <div class="bs-component">
              <div class="alert alert-dismissible alert-danger">
                <strong><?php echo $error_message; ?></strong>
              </div>
            </div>

          <?php
          } elseif (!empty($ok_message)) { ?>
            <div class="bs-component">
              <div class="alert alert-dismissible alert-success">
                <strong><?php echo $ok_message; ?></strong>
              </div>
            </div>

          <?php } else { ?>
            <div class="bs-component">
              <div class="alert alert-dismissible alert-info">
                <strong>Los campos con <i class="fa fa-asterisk" aria-hidden="true"></i> son obligatorios</strong>
              </div>
            </div>
          <?php
          }
          ?>
          <!-- 
               -->
          <div class="tile-body">
            <form method="POST">

              <!-- INPUT DE TIPO HIDDEN PARA ENVIAR EL ID DEL USUARIO CON LA SESIÓN ACTIVA -->
              <input type="hidden" value="<?php echo $_SESSION['id']; ?>" name="id">
              <!-- ===================================================================================-->
              <div class="form-group">
                <label class="control-label">Título</label> <i class="fa fa-asterisk" aria-hidden="true"></i>
                <input class="form-control" type="text" name="title" value="<?php echo !empty($_POST['title']) ? $_POST['title'] : '' ?>" placeholder="Ingrese el título...">
              </div>

              <div class="form-group">
                <label class="control-label">Descripción del problema <i class="fa fa-asterisk" aria-hidden="true"></i></label>
                <textarea class="form-control" rows="4" placeholder="Ingresa los detalles..." name="description">
                  </textarea>
              </div>
              <div class="form-group">
                <label class="control-label">Prioridad</label> <i class="fa fa-asterisk" aria-hidden="true"></i>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="form-check-input" type="radio" name="priority" value="1">Alta
                  </label>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="form-check-input" type="radio" name="priority" value="2">Media
                  </label>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="form-check-input" type="radio" name="priority" value="3">Baja
                  </label>
                </div>
              </div>
              <!--
                <div class="form-group">
                  <label class="control-label">Puedes subir una captura de pantalla</label>
                  <input class="form-control" type="file">
                </div>
                -->
              <div class="tile-footer">
                <button class="btn btn-primary" type="submit" name="register"><i class="fa fa-fw fa-lg fa-check-circle"></i>Registrar</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="index.php" onclick="if (confirm('¿Descartar la incidencia?')) {return true; } else {return false;}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancelar</a>
              </div>
          </div>

          </form>
        </div>
      </div>

    </div>
  </main>
  <?php require_once 'includes/footer.inc.php'; ?>