<?php echo $this->extend('backend-layout'); ?>

<?php echo $this->section('header') ?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo $titulo; ?></title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('assets'); ?>/plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url('assets'); ?>/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url('assets'); ?>/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url('assets'); ?>/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets'); ?>/dist/css/adminlte.min.css">
</head>
<?php echo $this->endSection() ?>

<?php echo $this->section('content') ?>
<div class="wrapper">
    <!-- Navbar -->
    <?php echo $this->include('backend-nav'); ?>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <?php echo $this->include('backend-sidebar', array($menu, $submenu)); ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1><?php echo $h1; ?></h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Inicio</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url('juzgado'); ?>">Juzgados</a></li>
                  <li class="breadcrumb-item active"><?php echo $h1; ?></li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title"><?php echo $descripcion; ?></h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <div>
                  <a href='<?php echo base_url('juzgado/nuevopersonal'); ?>/<?php echo $juzgado->id_juzgado; ?>' class='btn btn-primary'>Agregar personal</a>
                  </div>
                  <table id="personas" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>Nro</th>
                      <th>Apellidos</th>
                      <th>Nombre(s)</th>
                      <th>Dni</th>
                      <th>Estado</th>
                      <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $base_url = base_url('juzgado');
                    $i=0;
                    $estado='';
                    $botones = '';
                    foreach ($personal as $persona)
                    {
                      $i++;
                      if ($persona->esta_activo == 0) {
                        $estado='INACTIVO';
                      } else {
                        $estado='ACTIVO';
                        $botones = "
                        <a href='{$base_url}/quitar/{$juzgado->id_juzgado}/{$persona->id_persona}' class='quitar btn btn-danger'>Quitar</a>
                        ";
                      }

                      echo "<tr>";
                      echo "<td>{$i}</td>";
                      echo "<td>{$persona->apellidos_persona}</td>";
                      echo "<td>{$persona->nombres_persona}</td>";
                      echo "<td>{$persona->dni}</td>";
                      echo "<td>{$estado}</td>";
                      echo "<td>
                        <div class='btn-group'>
                          {$botones}
                        </div>
                      </td>";
                      echo "</tr>";
                    }
                    ?>
                    </tbody>
                    <tfoot>
                    <tr>
                      <th>Nro</th>
                      <th>Apellidos</th>
                      <th>Nombre(s)</th>
                      <th>Dni</th>
                      <th>Estado</th>
                      <th>Acciones</th>
                    </tr>
                    </tfoot>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?php echo $this->include('backend-footer'); ?>

    <!-- Control Sidebar -->
    <?php echo $this->include('backend-control-sidebar'); ?>
    <!-- /.control-sidebar -->

    <div id="verPersona"></div>
</div>
<!-- ./wrapper -->
<?php echo $this->endSection() ?>

<?php echo $this->section('script') ?>
<!-- jQuery -->
<script src="<?php echo base_url('assets'); ?>/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url('assets'); ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="<?php echo base_url('assets'); ?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url('assets'); ?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url('assets'); ?>/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url('assets'); ?>/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo base_url('assets'); ?>/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url('assets'); ?>/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?php echo base_url('assets'); ?>/plugins/jszip/jszip.min.js"></script>
<script src="<?php echo base_url('assets'); ?>/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?php echo base_url('assets'); ?>/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?php echo base_url('assets'); ?>/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url('assets'); ?>/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo base_url('assets'); ?>/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src="<?php echo base_url('assets'); ?>/plugins/datatables-language/dataTables.spanish.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets'); ?>/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('assets'); ?>/dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#personas").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
      "language": spanish
    }).buttons().container().appendTo('#personas_wrapper .col-md-6:eq(0)');
  });

  $( "a.quitar" ).click(function() {
    
    var r = confirm("¿Seguro que desea quitar del juzgado a la persona?");
    if (r == true) {
    } else {
      return false;
    }
  });
</script>
<?php echo $this->endSection() ?>