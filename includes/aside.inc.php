
<aside class="app-sidebar">
        <div class="app-sidebar__user"><img class="app-sidebar__user-avatar img-thumbnail rounded" src="images/team/<?php echo $_SESSION['img']; ?>" alt="<?php echo $_SESSION['name']; ?>">
          <div>
            <p class="app-sidebar__user-name"><?php echo $_SESSION['name']; ?></p>
            <!-- <p class="app-sideba__user-designation">Administrador</p> -->
            <p class="app-sideba__user-designation"><?php echo $_SESSION['desc_lev']; ?></p>
          </div>
          <!-- Notice: Undefined index: image in C:\wamp64\www\ISSD-4-SEMESTRE\Clase_11_Parcial_2\includes\aside.inc.php on line  -->
        </div>
        <ul class="app-menu">
            <li><a class="app-menu__item active" href="index.php"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Inicio</span></a></li>
    
            <li><a class="app-menu__item" href="carga.php"><i class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">Registro</span></a></li>
    
            <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-th-list"></i><span class="app-menu__label">Listados</span><i class="treeview-indicator fa fa-angle-right"></i></a>
              <ul class="treeview-menu">
                <li><a class="treeview-item" href="listado.php"><i class="icon fa fa-circle-o"></i> Listado de incidencias</a></li>
                <!--otros listados
                <li><a class="treeview-item" href="listado.html"><i class="icon fa fa-circle-o"></i> Listado2</a></li>
                <li><a class="treeview-item" href="listado.html"><i class="icon fa fa-circle-o"></i> Listado3</a></li>            
                -->
              </ul>
            </li>
          </ul>
      </aside>