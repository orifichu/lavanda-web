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
  <!-- Select2 style -->
  <link rel="stylesheet" href="<?php echo base_url('assets'); ?>/plugins/select2/css/select2.min.css">
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
                  <li class="breadcrumb-item"><a href="<?php echo base_url('juzgado/personal/'.$juzgado->id_juzgado); ?>">Personal de juzgado</a></li>
                  <li class="breadcrumb-item active">Nuevo</li>
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
              <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">Datos</h3>
                  </div>
                  <!-- /.card-header -->

                  <?php
                  $action = base_url('juzgado/insertarpersonal');
                  ?>

                  <!-- form start -->
                  <form id="frmJuzgadoPersonal" action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id_juzgado" value="<?php echo $juzgado->id_juzgado;?>" />
                    <div class="card-body">
                        <div class="row">
                          <div class="col-sm-6">
                            <div class="form-group">
                              <label for="id_persona">Persona</label>
                              <select id="id_persona" name="id_persona" class="form-control" data-toggle="tooltip">
                                <option value="0">Seleccione una persona</option>
                                <?php  foreach ($personas as $persona): ?>
                                <option value="<?php echo $persona->id_persona;?>"><?php echo $persona->apellidos_persona . ' ' . $persona->nombres_persona; ?></option>
                                <?php endforeach; ?> 
                              </select>
                            </div>
                          </div>
                          <div class="col-sm-6">
                          </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                      <div class="col-md-10 row m-auto">
                        <div class="col-md-3 m-auto">
                          <button type="submit" class="btn btn-primary" id="guardar"><i class="fas fa-save"></i> Guardar</button>
                          <a href='<?php echo base_url('juzgado/personal/'.$juzgado->id_juzgado); ?>' class='btn btn-primary'><i class="fas fa-angle-double-left"></i> Volver</a>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
                <!-- /.card -->
              </div>
              <!--/.col (left) -->

              <!-- right column -->
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
<!-- Select2 -->
<script src="<?php echo base_url('assets'); ?>/plugins/select2/js/select2.min.js"></script>
<!-- Page specific script -->

<script>
  $(document).ready(() => {
    //Initialize Select2 Elements
    $('.select2').select2();
  });

  function pulsar(e) {
    if (e.which === 13 && !e.shiftKey) {
      e.preventDefault();
      console.log('prevented');
      return false;
    }
  }

  $( "button#guardar" ).click(function() {
    // //validación de formulario
    correcto = true;

    var id_persona = $('#id_persona').val();

    if (id_persona == 0) {
        correcto = false;
        msj = "Seleccione un tipo de juzgado";
        $('#id_persona').css('border-color', 'red');
        $('#id_persona').attr("data-original-title",msj);
    } else {
        $('#id_persona').css('border-color', '');
        $('#id_persona').attr("data-original-title",'');
    }

    if(correcto){
      $("#frmJuzgadoPersonal").submit();
    } else {
      return false;
    }

  });
</script>
<?php echo $this->endSection() ?>