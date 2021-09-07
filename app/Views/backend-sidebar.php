<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo base_url(); ?>" class="brand-link">
      <img src="<?php echo base_url('assets'); ?>/dist/img/LavandaLogo.png" alt="Lavanda Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Lavanda</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php //echo base_url('assets'); ?>/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Luis Esteves</a>
        </div>
      </div> -->

      <!-- SidebarSearch Form -->
      <!-- <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Buscar" aria-label="Buscar">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>
 -->
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <!-- <a href="<?php //echo base_url(); ?>" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a> -->
            <!--ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../../index.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v1</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../../index2.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v2</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../../index3.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v3</p>
                </a>
              </li>
            </ul-->
          </li>
          <li class="nav-header">MANTENIMIENTO</li>
          <li class="nav-item menu-open">
            <a href="<?php echo base_url('link'); ?>" class="nav-link <?php echo ($menu == 'links') ? 'active' : ''; ?>">
              <i class="nav-icon fas fa-link"></i>
              <p>
                Enlaces de interés
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url('link/nuevo'); ?>" class="nav-link <?php echo ($menu == 'links' && $submenu == 'nuevo') ? 'active' : ''; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Nuevo</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('link'); ?>" class="nav-link <?php echo ($menu == 'links' && $submenu == 'listado') ? 'active' : ''; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listado</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- Juzgados -->
          <li class="nav-item">
            <a href="<?php echo base_url('juzgado'); ?>" class="nav-link">
              <i class="nav-icon fas fa-university"></i>
              <p>
                Juzgados de Paz
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url('juzgado/nuevo'); ?>" class="nav-link <?php echo ($menu == 'links' && $submenu == 'nuevo') ? 'active' : ''; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Nuevo</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('juzgado'); ?>" class="nav-link <?php echo ($menu == 'links' && $submenu == 'listado') ? 'active' : ''; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listado</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- Personas -->
          <li class="nav-item">
            <a href="<?php echo base_url('personas'); ?>" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Personas
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url('persona/nuevo'); ?>" class="nav-link <?php echo ($menu == 'links' && $submenu == 'nuevo') ? 'active' : ''; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Nuevo</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('persona'); ?>" class="nav-link <?php echo ($menu == 'links' && $submenu == 'listado') ? 'active' : ''; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listado</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>