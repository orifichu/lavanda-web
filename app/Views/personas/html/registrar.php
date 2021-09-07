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
                  <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                  <li class="breadcrumb-item"><a href="#">Enlaces de interés</a></li>
                  <li class="breadcrumb-item active"><?php echo ($juzgados==null)?'Nuevo':$juzgados->nombre_juzgado; ?></li>
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
                    $action = '';
                    $item_id = 0;
                    $item_nombres_persona = '';
                    $item_apellidos_persona = '';
                  if ( $personas == null ) {
                    $action = base_url('persona/insertar');
                    $item_id = 0;
                  } else {
                    $action = base_url('persona/guardar');
                    $item_id = $personas->id_persona;
                    // $item_id_tipo = $personas->id_tipo;
                    // $item_nombre_tipo = $personas->nombre_tipo;
                    // $item_id_distrito = $personas->id_distrito;
                    // $item_id_provincia = $personas->id_provincia;
                    // $item_descripcion_distrito = $personas->descripcion_distrito;
                    // $item_nombre_juzgado = $personas->nombre_juzgado;
                    // $item_centro_poblado = $personas->centro_poblado;
                    // $item_comp_territorial = $personas->competencia_territorial;
                  }
                  ?>

                  <!-- form start -->
                  <form id="frmJuzgado" action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
                  <!-- <form id="frmJuzgado"> -->
			              <input type="hidden" name="txtIdJuzgado" value="<?php echo $item_id;?>" />
                    <div class="card-body">
                        <div class="row">
                          <div class="col-sm-6">
                            <div class="form-group">
                              <label for="titulo">Nombres Completos</label>
                              <input type="text" class="form-control" id="txtxNombres" name="txtxNombres" placeholder="Nombre Completos" data-toggle="tooltip" value="<?php echo $item_nombre_juzgado; ?>"/>
                            </div>
                            <div class="form-group">
                              <label for="url">Apellidos Completos</label>
                              <input type="text" class="form-control" id="txtApellidos" name="txtApellidos" placeholder="Apellidos Completos" data-toggle="tooltip" value="<?php echo $item_centro_poblado; ?>" />
                            </div>
                            <div class="form-group">
                              <label for="url">Tipo</label>
                              <select id="cmbTipo" name="cmbTipo" class="form-control" data-toggle="tooltip" style="width: 100% !important">
                                <option value="0">Seleccione tipo de juzgado</option>
                                <?php  foreach ($tipos as $tipo): ?>
                                <option value="<?php echo $tipo->id_tipo;?>" <?php if ( $juzgados != null ) {if($tipo->id_tipo == $item_id_tipo){echo 'selected';}} ?>><?php echo $tipo->nombre_tipo; ?></option>
                                <?php endforeach; ?> 
                              </select>
                            </div>
                            <div class="form-group">
                              <label for="url">Region</label>
                              <select id="cmbRegion" name="cmbRegion" class="form-control" data-toggle="tooltip" style="width: 100% !important">
                                <option value="1">LAMBAYEQUE</option>
                              </select>
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="form-group">
                              <label for="titulo">Provincia</label>
                              <select id="cmbProvincia" name="cmbProvincia" class="form-control" data-toggle="tooltip" style="width: 100% !important">
                                <option value="0" selected>Seleccione una provincia</option>
                                <?php  foreach ($provincias as $provincia): ?>
                                <option value="<?php echo $provincia->id_provincia; ?>"<?php if ( $juzgados != null ) {if($provincia->id_provincia == $item_id_provincia){echo 'selected';}} ?>><?php echo $provincia->descripcion_provincia; ?></option>
                                <?php endforeach; ?> 
                              </select>
                            </div>
                            <div class="form-group">
                              <label for="url">Distrito</label>
                              <select id="cmbDistrito" name="cmbDistrito" class="form-control" data-toggle="tooltip" style="width: 100% !important">
                                <option value="0" selected>Seleccione un distrito</option>
                                <?php if ( $juzgados != null ) { ?>
                                <?php  foreach ($distritos as $distrito):?>
                                <option value="<?php echo $distrito->id_distrito; ?>"<?php if ( $juzgados != null ) {if($distrito->id_distrito == $item_id_distrito){echo 'selected';}} ?>><?php echo $distrito->descripcion_distrito; ?></option>
                                <?php endforeach; ?>
                                <?php } ?> 
                              </select>
                            </div>
                            <div class="form-group">
                              <label for="url">Competencia Territorial</label>
                              <textarea id="competenciaTerritorial" name="competenciaTerritorial" onkeydown="pulsar(event)" class="form-control" data-toggle="tooltip" placeholder="Competencia Territorial." rows="5"><?php if ( $juzgados != null ) {echo $item_comp_territorial;}; ?></textarea>
                            </div>
                          </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                      <div class="col-md-10 row m-auto">
                        <div class="col-md-3 m-auto">
                          <button type="submit" class="btn btn-primary" id="guardar"><i class="fas fa-save"></i> Guardar</button>
                          <a href='<?php echo base_url('juzgado'); ?>' class='btn btn-primary'><i class="fas fa-angle-double-left"></i> Volver</a>
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

  $(document).ready(() => {
      document.getElementById("cmbRegion").disabled = true;
  });

  $("select[name=cmbProvincia]").change(function() {
      var cmbProvincia = $('select[name=cmbProvincia]').val();

      listarDistritos(cmbProvincia);
  });

  var listarDistritos = function(cmbProvincia) {
    var url = "<?php echo base_url('juzgado'); ?>/listarDistrito/"+cmbProvincia;
    
    $.get( url )
    .done(function(response) {
      $("#cmbDistrito").html(response);
    });
  };

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

    var nombreJuzgado = $('#nombreJuzgado').val();
    var centroPoblado = $('#centroPoblado').val();
    var tipo = $('#cmbTipo').val();
    var provincia = $('#cmbProvincia').val();
    var distrito = $('#cmbDistrito').val();
    var competenciaTerritorial = $('#competenciaTerritorial').val();

    if (nombreJuzgado == '') {
        correcto = false;
        msj = "Ingresar el nombre del juzgado";
        $('#nombreJuzgado').css('border-color', 'red');
        $('#nombreJuzgado').attr("data-original-title",msj);
    } else {
        $('#nombreJuzgado').css('border-color', '');
        $('#nombreJuzgado').attr("data-original-title",'');
    }

    if (centroPoblado == '') {
        correcto = false;
        msj = "Ingresar correo usuario";
        $('#centroPoblado').css('border-color', 'red');
        $('#centroPoblado').attr("data-original-title",msj);
    } else {
        $('#centroPoblado').css('border-color', '');
        $('#centroPoblado').attr("data-original-title",'');
    }

    if (tipo == 0) {
        correcto = false;
        msj = "Seleccione un tipo de juzgado";
        $('#cmbTipo').css('border-color', 'red');
        $('#cmbTipo').attr("data-original-title",msj);
    } else {
        $('#cmbTipo').css('border-color', '');
        $('#cmbTipo').attr("data-original-title",'');
    }

    if (provincia == 0) {
        correcto = false;
        msj = "Seleccione una provincia";
        $('#cmbProvincia').css('border-color', 'red');
        $('#cmbProvincia').attr("data-original-title",msj);
    } else {
        $('#cmbProvincia').css('border-color', '');
        $('#cmbProvincia').attr("data-original-title",'');
    }

    if (distrito == 0) {
        correcto = false;
        msj = "Seleccione un distrito";
        $('#cmbDistrito').css('border-color', 'red');
        $('#cmbDistrito').attr("data-original-title",msj);
    } else {
        $('#cmbDistrito').css('border-color', '');
        $('#cmbDistrito').attr("data-original-title",'');
    }

    if (competenciaTerritorial == '') {
        correcto = false;
        msj = "Ingresar una competencia territorial";
        $('#competenciaTerritorial').css('border-color', 'red');
        $('#competenciaTerritorial').attr("data-original-title",msj);
    } else {
        $('#competenciaTerritorial').css('border-color', '');
        $('#competenciaTerritorial').attr("data-original-title",'');
    }

    return correcto;

    // registrarJuzgado();
    $("#frmJuzgado").submit();
  });
</script>
<?php echo $this->endSection() ?>