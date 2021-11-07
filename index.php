<?php
session_start();

if (empty($_SESSION['name'])) {
  header("Location: logout.php");
  exit;
}

// archivos requeridos para traer las funciones que cuentan incidencias y usuarios en el panel index.php
require_once 'functions/connection.php';
$conn = connection_db();
require_once 'functions/login.php';
require_once 'functions/select_incidents.php';
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
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
        <h1><i class="fa fa-dashboard"></i> Hola <?php echo $_SESSION['name'] ?></h1>
        <p>Este es nuestro panel de administración. Por favor selecciona alguna opción del menú lateral izquierdo.
        <blockquote class="blockquote-footer">Acceso del: <?php echo $_SESSION['last_access'] ?></blockquote>
        </p>

      </div>
      <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
      </ul>
    </div>


    <div class="row">
      <div class="col-md-3">
        <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
          <div class="info">
            <!-- cantidad de usuarios -->
            <h4>Usuarios</h4>
            <p><b><?php echo count_users($conn); ?></b></p>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="widget-small info coloured-icon"><i class="icon fa fa-thumbs-o-up fa-3x"></i>
          <div class="info">
            <!-- cantidad de incidencias finalizadas -->
            <h4>Incidencias Finalizadas</h4>
            <p><b><?php echo count_incidents($conn, 3); ?></b></p>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="widget-small warning coloured-icon"><i class="icon fa fa-files-o fa-3x"></i>
          <div class="info">
            <!-- cantidad de incidencias en proceso -->
            <h4>Incidencias en proceso</h4>
            <p><b><?php echo count_incidents($conn, 2); ?></b></p>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="widget-small danger coloured-icon"><i class="icon fa fa-star fa-3x"></i>
          <div class="info">
            <!-- cantidad de incidencias empezadas -->
            <h4>Incidencias Iniciadas</h4>
            <p><b><?php echo count_incidents($conn, 1); ?></b></p>
          </div>
        </div>
      </div>
    </div>

  </main>
  <?php require_once 'includes/footer.inc.php'; ?>