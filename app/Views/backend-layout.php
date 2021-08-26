<!DOCTYPE html>
<html lang="es">
    <?php echo $this->renderSection('header'); ?>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <?php echo $this->include('backend-nav'); ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php echo $this->include('backend-sidebar'); ?>

        <?php echo $this->renderSection('content'); ?>

        <?php echo $this->include('backend-footer'); ?>

        <!-- Control Sidebar -->
        <?php echo $this->include('backend-control-sidebar'); ?>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
    <?php echo $this->renderSection('script'); ?>
</body>
</html>