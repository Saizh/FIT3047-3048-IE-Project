<?php
$cakeDescription = 'Language Tub';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <?= $this->Html->meta('icon') ?>

    <!-- Bootstrap core CSS-->
    <?= $this->Html->css('bootstrap.min.css') ?>

    <!-- Custom fonts for this template-->
    <?= $this->Html->css('all.min.css') ?>

    <!-- Page level plugin CSS-->
    <!--<?= $this->Html->css('dataTables.bootstrap4.css') ?>-->

    <!-- Custom styles for this template-->
    <?= $this->Html->css('sb-admin.css') ?>
    <link type="text/css" rel="stylesheet" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"/>
    <?php $this->layout = false;?>
    <?= $this->Html->css('style-2.css') ?>
    <?= $this->Html->css('util.css') ?>
    <?php echo $this->Html->css('admin'); ?>

    <?= $this->Html->script('jquery.min.js') ?>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>


</head>
<?= $this->element('navigation2') ?>


  <body id="page-top">

    <nav class="navbar navbar-expand navbar-dark bg-white static-top">

      <a class="navbar-brand mr-1 text-dark" href=>Admin Tools</a>


      <!-- Navbar Search -->


      <!-- Navbar -->
      <ul class="navbar-nav ml-auto ml-md-0">


      </ul>

    </nav>

    <div id="wrapper">

      <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
        <li class="nav-item">
            <?php echo $this->Html->link(
                'Users',
                ['controller' => 'users', 'action' => 'admin_mgmt', '_full' => true],['class' => 'nav-link']
            );?>
        </li>
        <li class="nav-item">
            <?php echo $this->Html->link(
                'Classes',
                ['controller' => 'users', 'action' => 'classmgmt', '_full' => true],['class' => 'nav-link']
            );?>
        </li>
        <li class="nav-item">
            <?php echo $this->Html->link(
            'Schools',
            ['controller' => 'users', 'action' => 'schoolindex', '_full' => true],['class' => 'nav-link']
            );?>
        </li>

        </li>
        <li class="nav-item">
            <?php echo $this->Html->link('Enquiries', ['controller' => 'users', 'action' => 'enquirymgmt', '_full' => true],['class' => 'nav-link'])?>
        </li>
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
                <?php echo $this->Html->link('List All Exercises', ['controller' => 'Exercises', 'action' => 'index'])?>
                <div class="dropdown-divider"></div>
                <?php echo $this->Html->link('List All Exercise Attempts', ['controller' => 'ExerciseAttempts', 'action' => 'index'])?>
            </div>
        </li>
        <li class="nav-item">
            <?php echo $this->Html->link('Questions', ['controller' => 'Questions', 'action' => 'index'],['class' => 'nav-link'])?>
        </li>
        </li>
        <li class="nav-item">
            <?php echo $this->Html->link('Techniques', ['controller' => 'Techniques', 'action' => 'index'],['class' => 'nav-link'])?>
        </li>
        <li class="nav-item">
            <?php echo $this->Html->link('Terms and Conditions', ['controller' => 'users', 'action' => 'showterms', '_full' => true],['class' => 'nav-link'])?>
        </li>
          </ul>


      <div id="content-wrapper">

        <div class="container-fluid">



              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>

        <!-- /.container-fluid -->
      <?= $this->Flash->render() ?>
      <?= $this->fetch('content') ?>
                    </tr>
                  </thead>
                </table>
              </div>
      </div>
      <!-- /.content-wrapper -->
      </div>
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
            <a class="btn btn-primary" href="login.html">Logout</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->

    <?= $this->Html->script('jquery.min.js') ?>
    <?= $this->Html->script('bootstrap.bundle.min.js') ?>


    <!-- Core plugin JavaScript-->
    <?= $this->Html->script('jquery.easing.min.js') ?>


    <!-- Page level plugin JavaScript-->
    <?= $this->Html->script('Chart.min.js') ?>
    <?= $this->Html->script('jquery.dataTables.js') ?>
    <?= $this->Html->script('dataTables.bootstrap4.js') ?>


    <!-- Custom scripts for all pages-->
    <?= $this->Html->script('bootstrap.bundle.min.js') ?>
     <?= $this->Html->script('sb-admin.min.js') ?>


    <!-- Demo scripts for this page-->
    <?= $this->Html->script('datatables-demo.js') ?>
    <?= $this->Html->script('chart-area-demo.js') ?>

 <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
 <script>
     $(document).ready( function () {
         $('table').DataTable();
         $('.select2').select2();
     } );
 </script>


  </body>
<?= $this->element('footer') ?>
</html>
