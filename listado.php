<?php
session_start();
if (empty($_SESSION['name'])) {
  header("Location: logout.php");
  exit;
}

// conexión
require_once 'functions/connection.php';
$conn = connection_db();

// listado de incidencias
require_once 'functions/select_incidents.php';

$list_inc = list_incidents($conn, $_SESSION['id_lev']);
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
        <h1><i class="fa fa-th-list"></i> Listados</h1>
        <!-- si es administrador vera este titulo-->
        <?php
        if ($_SESSION['id_lev'] == 1) { ?>
          <p>Listado total de incidencias</p>
        <?php
        } elseif ($_SESSION['id_lev'] == 2) { ?>

          <!-- si es usuario normal vera este titulo--->
          <p>Listado de mis incidencias cargadas</p>
        <?php
        } else { ?>
          <!-- si es técnico vera este titulo-->
          <p>Listado de incidencias no finalizadas</p>
        <?php
        }
        ?>
      </div>
      <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item">Listado</li>
        <li class="breadcrumb-item active"><a href="listado.php">Listado de Incidencias</a></li>
      </ul>
    </div>
    <div class="row">

      <div class="col-md-12">
        <div class="tile">
          <!-- numero de incidencias -->
          <h3 class="tile-title">Incidencias (<?php echo count($list_inc); ?>)</h3>
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Título</th>
                  <th>Descripción</th>
                  <th>Prioridad</th>
                  <th>Registro</th>
                  <th>Estado</th>
                  <th>Solicitante</th>
                  <th>Area</th>
                  <th>Opciones</th>

                </tr>
              </thead>
              <tbody>
                <?php
                for ($i = 0; $i < count($list_inc); $i++) { ?>

                  <tr class="table-<?php        // color de las filas
                                    if ($list_inc[$i]['IDSTA'] == 3) echo 'success';
                                    elseif ($list_inc[$i]['IDPRI'] == 1) echo 'danger';
                                    else if ($list_inc[$i]['IDPRI'] == 2) echo 'warning';
                                    else if ($list_inc[$i]['IDPRI'] == 3) echo 'info';
                                    ?>">

                    <td><?php echo $list_inc[$i]['ID'] ?></td>
                    <td><?php echo $list_inc[$i]['TITLE'] ?></td>
                    <td><?php echo $list_inc[$i]['DESCRIPINC'] ?></td>
                    <td><?php echo $list_inc[$i]['DESCRIPPRI'] ?></td>
                    <td><?php echo $list_inc[$i]['DATEINC'] ?></td>
                    <td><?php echo $list_inc[$i]['DESCRIPSTA'] ?></td>
                    <td><?php echo $list_inc[$i]['NAMEUS'] . ' ' . $list_inc[$i]['LASTNAMEUS']  ?></td>
                    <td><?php echo $list_inc[$i]['DESCRIPAR'] ?></td>
                    <td><a href="#">Ver detalles...</a></td>
                  </tr>
                <?php
                }
                ?>

              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="clearfix"></div>

    </div>
  </main>
  <?php require_once 'includes/footer.inc.php'; ?>