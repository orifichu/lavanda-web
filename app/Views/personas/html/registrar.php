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
                  <li class="breadcrumb-item"><a href="<?php echo base_url('persona'); ?>">Personas</a></li>
                  <li class="breadcrumb-item active"><?php echo ($persona==null)?'Nuevo':$persona->nombres_persona.' '.$persona->apellidos_persona; ?></li>
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
                    $action            = '';
                    $id_persona        = 0;
                    $id_cargo          = 0;
                    $nombres_persona   = '';
                    $apellidos_persona = '';
                    $dni               = '';
                    $correo_persona    = '';
                    $telefono_persona  = '';
                    $resolucion_juez   = '';
                    $periodo_juez      = '';
                    $horario_atencion  = '';
                    $esta_activo       = 0;
                  if ( $persona == null ) {
                    $action = base_url('persona/insertar');
                  } else {
                    $action = base_url('persona/guardar');

                    $id_persona        = $persona->id_persona;
                    $id_cargo          = $persona->id_cargo;
                    $nombres_persona   = $persona->nombres_persona;
                    $apellidos_persona = $persona->apellidos_persona;
                    $dni               = $persona->dni;
                    $correo_persona    = $persona->correo_persona;
                    $telefono_persona  = $persona->telefono_persona;
                    $resolucion_juez   = $persona->resolucion_juez;
                    $periodo_juez      = $persona->periodo_juez;
                    $horario_atencion  = $persona->horario_atencion;
                    $esta_activo       = $persona->esta_activo;
                  }
                  ?>

                  <!-- form start -->
                  <form id="frmPersona" action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
			              <input type="hidden" name="txtIdPersona" value="<?php echo $id_persona;?>" />
                    <div class="card-body">
                        <div class="row">
                          <div class="col-sm-6">
                            <div class="form-group">
                              <label for="txtNombres">Nombres completos</label>
                              <input type="text" class="form-control" id="txtNombres" name="txtNombres" placeholder="Nombres completos" data-toggle="tooltip" value="<?php echo $nombres_persona; ?>"/>
                            </div>
                            <div class="form-group">
                              <label for="txtApellidos">Apellidos completos</label>
                              <input type="text" class="form-control" id="txtApellidos" name="txtApellidos" placeholder="Apellidos completos" data-toggle="tooltip" value="<?php echo $apellidos_persona; ?>" />
                            </div>
                            <div class="form-group">
                              <label for="cmbCargo">Cargo</label>
                              <select id="cmbCargo" name="cmbCargo" class="form-control" data-toggle="tooltip">
                                <option value="0">Seleccione cargo</option>
                                <?php foreach ($cargos as $cargo): ?>
                                <option value="<?php echo $cargo->id_tipo;?>" <?php if ( $persona != null ) {if ($cargo->id_tipo == $id_cargo){echo 'selected';}} ?>><?php echo $cargo->nombre_tipo; ?></option>
                                <?php endforeach; ?> 
                              </select>
                            </div>
                            <div class="form-group">
                              <label for="txtDni">Dni</label>
                              <input type="text" class="form-control" id="txtDni" name="txtDni" placeholder="Dni" data-toggle="tooltip" value="<?php echo $dni; ?>" />
                            </div>
                            <div class="form-group">
                              <label for="txtCorreo">Correo</label>
                              <input type="email" class="form-control" id="txtCorreo" name="txtCorreo" placeholder="Correo" data-toggle="tooltip" value="<?php echo $correo_persona; ?>" />
                            </div>
                            <div class="form-group">
                              <label for="txtTelefono">Teléfono</label>
                              <input type="text" class="form-control" id="txtTelefono" name="txtTelefono" placeholder="Teléfono" data-toggle="tooltip" value="<?php echo $telefono_persona; ?>" />
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="form-group">
                              <label for="txtResolucion">Resolución nombramiento</label>
                              <input type="text" class="form-control" id="txtResolucion" name="txtResolucion" placeholder="Resolución nombramiento" data-toggle="tooltip" value="<?php echo $resolucion_juez; ?>"/>
                            </div>
                            <div class="form-group">
                              <label for="txtPeriodo">Periodo nombramiento</label>
                              <input type="text" class="form-control" id="txtPeriodo" name="txtPeriodo" placeholder="Periodo nombramiento" data-toggle="tooltip" value="<?php echo $periodo_juez; ?>"/>
                            </div>
                            <div class="form-group">
                              <label for="txtHorario">Horario de atención</label>
                              <input type="text" class="form-control" id="txtHorario" name="txtHorario" placeholder="Horario de atención" data-toggle="tooltip" value="<?php echo $horario_atencion; ?>"/>
                            </div>
                          </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                      <div class="col-md-10 row m-auto">
                        <div class="col-md-3 m-auto">
                          <button type="submit" class="btn btn-primary" id="guardar"><i class="fas fa-save"></i> Guardar</button>
                          <a href='<?php echo base_url('persona'); ?>' class='btn btn-primary'><i class="fas fa-angle-double-left"></i> Volver</a>
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

  $( "button#guardar" ).click(function() {
    //validación de formulario
    correcto = true;

    var nombres    = $('#txtNombres').val();
    var apellidos  = $('#txtApellidos').val();
    var cargo      = $('#cmbCargo').val();
    var dni        = $('#txtDni').val();
    var correo     = $('#txtCorreo').val();
    var telefono   = $('#txtTelefono').val();
    var resolucion = $('#txtResolucion').val();
    var periodo    = $('#txtPeriodo').val();
    var horario    = $('#txtHorario').val();
    

    if (nombres == '') {
        correcto = false;
        msj = "Ingresar el(los) nombre(s)";
        $('#txtNombres').css('border-color', 'red');
        $('#txtNombres').attr("data-original-title",msj);
    } else {
        $('#txtNombres').css('border-color', '');
        $('#txtNombres').attr("data-original-title",'');
    }

    if (apellidos == '') {
        correcto = false;
        msj = "Ingresar los apellidos";
        $('#txtApellidos').css('border-color', 'red');
        $('#txtApellidos').attr("data-original-title",msj);
    } else {
        $('#txtApellidos').css('border-color', '');
        $('#txtApellidos').attr("data-original-title",'');
    }

    if (cargo == 0) {
        correcto = false;
        msj = "Seleccione un cargo";
        $('#cmbCargo').css('border-color', 'red');
        $('#cmbCargo').attr("data-original-title",msj);
    } else {
        $('#cmbCargo').css('border-color', '');
        $('#cmbCargo').attr("data-original-title",'');
    }

    if (dni == '') {
        correcto = false;
        msj = "Ingresar el dni";
        $('#txtDni').css('border-color', 'red');
        $('#txtDni').attr("data-original-title",msj);
    } else {
        $('#txtDni').css('border-color', '');
        $('#txtDni').attr("data-original-title",'');
    }

    if (correo == '') {
        correcto = false;
        msj = "Ingresar el correo";
        $('#txtCorreo').css('border-color', 'red');
        $('#txtCorreo').attr("data-original-title",msj);
    } else {
        $('#txtCorreo').css('border-color', '');
        $('#txtCorreo').attr("data-original-title",'');
    }

    if (telefono == '') {
        correcto = false;
        msj = "Ingresar el telefono";
        $('#txtTelefono').css('border-color', 'red');
        $('#txtTelefono').attr("data-original-title",msj);
    } else {
        $('#txtTelefono').css('border-color', '');
        $('#txtTelefono').attr("data-original-title",'');
    }

    if(correcto){
      $("#frmPersona").submit();
    } else {
      return false;
    }
    
  });
</script>
<?php echo $this->endSection() ?>