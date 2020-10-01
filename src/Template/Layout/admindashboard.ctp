<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Language Tub Admin - Dashboard</title>

    <?php echo $this->Html->css('admin'); ?>
    <!-- Bootstrap core CSS-->
    <?php echo $this->Html->css('vendor/bootstrap/css/bootstrap.min.css'); ?>

    <!-- Custom fonts for this template-->
    <?php echo $this->Html->css('vendor/fontawesome-free/css/all.min.css'); ?>

    <!-- Custom styles for this template-->
    <?php echo $this->Html->css('sb-admin.css'); ?>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">

  </head>

  <body id="page-top">

    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

        <?php echo $this->Html->link('Language Tub - Admin Dashboard', ['controller' => 'Users', 'action' => 'adminhome'],['class' => 'navbar-brand mr-1'])?>

      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
      </button>


      <!-- Navbar -->
      <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user-circle fa-fw"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
          </div>
        </li>
        <li class="nav-item active">
              <?php echo $this->Html->link('Student Dashboard', ['controller' => 'Users', 'action' => 'dashboard'],['class' => 'nav-link'])?>
        </li>
      </ul>

    </nav>

    <div id="wrapper">

      <!-- Sidebar -->
      <ul class="sidebar navbar-nav">
          <li class="nav-item">
              <?php echo $this->Html->link('Sections', ['controller' => 'Sections', 'action' => 'index'],['class' => 'nav-link'])?>
          </li>
          <li class="nav-item">
              <?php echo $this->Html->link('Units', ['controller' => 'Units', 'action' => 'index'],['class' => 'nav-link'])?>
          </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span>Exercises</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <?php echo $this->Html->link('List All Exercises', ['controller' => 'Exercises', 'action' => 'index'],['class' => 'dropdown-item'])?>
            <?php echo $this->Html->link('List All Exercise Attempts', ['controller' => 'ExerciseAttempts', 'action' => 'index'],['class' => 'dropdown-item'])?>
          </div>
        </li>
          <li class="nav-item">
              <?php echo $this->Html->link('Questions', ['controller' => 'Questions', 'action' => 'index'],['class' => 'nav-link'])?>
          </li>
          <li class="nav-item">
              <?php echo $this->Html->link('Users', ['controller' => 'Users', 'action' => 'index'],['class' => 'nav-link'])?>
          </li>
          <li class="nav-item">
              <?php echo $this->Html->link('Techniques', ['controller' => 'Techniques', 'action' => 'index'],['class' => 'nav-link'])?>
          </li>
      </ul>

      <div id="content-wrapper">

        <div class="container-fluid">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div>

        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright © Language Tub 2018</span>
            </div>
          </div>
        </footer>

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" <?php echo $this->Html->link('Log Out', ['controller' => 'Users', 'action' => 'logout'])?></a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <?php echo $this->Html->script('vendor/jquery/jquery.min.js'); ?>
    <?php echo $this->Html->script('vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>

    <!-- Core plugin JavaScript-->
    <?php echo $this->Html->script('vendor/jquery-easing/jquery.easing.min.js'); ?>

    <!-- Page level plugin JavaScript-->
    <?php echo $this->Html->script('vendor/chart.js/Chart.min.js'); ?>
    <?php echo $this->Html->script('vendor/datatables/jquery.dataTables.js'); ?>
   <?php echo $this->Html->script('vendor/datatables/dataTables.bootstrap4.js'); ?>

    <!-- Custom scripts for all pages-->
   <?php echo $this->Html->script('sb-admin.min.js'); ?>

    <!-- Demo scripts for this page-->
    <?php echo $this->Html->script('demo/datatables-demo.js'); ?>
    <?php echo $this->Html->script('demo/chart-area-demo.js'); ?>

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>

  </body>

</html>
<script>
$(document).ready( function () {
    $('table').DataTable();
} );
</script>
