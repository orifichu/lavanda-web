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
                  <li class="breadcrumb-item"><a href="<?php echo base_url('links'); ?>">Enlaces de interés</a></li>
                  <li class="breadcrumb-item active"><?php echo $link->titulo; ?></li>
                </ol>
              </div>
            </div>
          </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="container-fluid">
            <div class="row">
              <!-- left column -->
              <div class="col-md-6">
                <!-- general form elements -->
                <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">Datos</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form id="form-link" action="<?php echo base_url('link/guardar'); ?>" method="post" enctype="multipart/form-data">
			              <input type="hidden" name="id_link" value="<?php echo $link->id_link;?>" />
                    <div class="card-body">
                      <div class="form-group">
                        <label for="titulo">Titulo</label>
                        <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Titulo" value="<?php echo $link->titulo; ?>" />
                      </div>
                      <div class="form-group">
                        <label for="url">Url</label>
                        <input type="text" class="form-control" id="url" name="url" placeholder="Url" value="<?php echo urldecode($link->url); ?>" />
                      </div>
                    </div>
                    <!-- /.card-body -->
                    
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary" id="guardar">Guardar</button>
                    </div>
                  </form>
                </div>
                <!-- /.card -->
              </div>
              <!--/.col (left) -->

              <!-- right column -->
              <div class="col-md-6">
                

              </div>
              <!--/.col (right) -->
            </div>
            <!-- /.row -->
          </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->

    <?php echo $this->include('backend-footer'); ?>

    <!-- Control Sidebar -->
    <?php echo $this->include('backend-control-sidebar'); ?>
    <!-- /.control-sidebar -->

<?php echo $this->endSection() ?>

<?php echo $this->section('script') ?>
<!-- jQuery -->
<script src="<?php echo base_url('assets'); ?>/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url('assets'); ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- bs-custom-file-input -->
<script src="<?php echo base_url('assets'); ?>/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets'); ?>/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('assets'); ?>/dist/js/demo.js"></script>
<!-- Page specific script -->

<script>
$( "button#guardar" ).click(function() {
  //validación de formulario
  var need_exit = false;

  $("input#titulo").each(function(){
    if ($.trim(this.value) == "") {
      alert("El título del enlace no puede estar vacío.");
      $( this ).focus();
      need_exit = true;
      return false;
    }
  });

  if (need_exit) return false;

  $("input#url").each(function(){
    if ($.trim(this.value) == "" ) {
      alert("El url del enlace no puede estar vací­o.");
      $( this ).focus();
      need_exit = true;
      return false;
    }
  });

  if (need_exit) return false;

  $("#form-link").submit();
});
</script>
<?php echo $this->endSection() ?>