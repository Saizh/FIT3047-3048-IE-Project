<?php
$cakeDescription = 'Language Tub';
use Cake\Core\Configure;
use Cake\Error\Debugger;
?>



      <div id="content-wrapper">

            <div class="container-fluid">

              <!-- Breadcrumbs-->
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="#">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Error</li>
              </ol>
              <a class="login100-form-title p-b-49"><br>Oops, this page cannot be found</a>
             <div class="desc-message">Something went wrong and you ended up here.</div>
             <div class="back-btn"><a><?= $this->Html->link(__('Back'), $this->request->referer()) ?></a></div>

                  <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>

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
     $('.myTable').DataTable();
 } );
 </script>



</html>