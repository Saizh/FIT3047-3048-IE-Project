<?php
$cakeDescription = 'Language Tub';
?>

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
    <?= $this->Html->css('admin') ?>

    <!-- Page level plugin CSS-->
    <?= $this->Html->css('dataTables.bootstrap4.css') ?>

    <!-- Custom styles for this template-->
    <?= $this->Html->css('sb-admin.css') ?>

    <?= $this->Html->css('jquery.dataTables.min.css') ?>
      <?php $this->layout = false;?>
      <?= $this->Html->css('style-2.css') ?>
      <?= $this->Html->css('util.css') ?>





  </head>
  <?= $this->element('navigation2') ?>
  <body id="page-top">

    <nav class="navbar navbar-expand navbar-dark bg-white static-top">

      <a class="navbar-brand mr-1 text-dark" href=>Teacher Tools</a>



            <ul class="nav-item dropdown no-arrow">

                                  </ul>

      <!-- Navbar Search -->


      <!-- Navbar -->
      <ul class="navbar-nav ml-auto ml-md-0">


      </ul>

    </nav>

    <div id="wrapper">

      <!--&lt;!&ndash; Sidebar &ndash;&gt;-->


      <ul class="sidebar navbar-nav">

                <div class="user-info">
                            <div class="collapse show"  style="">
                              <ul class="nav">
                                <li class="nav-item">
                                  <a class="nav-link" href="#"><center><strong>
                                    <span class="sidebar-mini"><?php echo $this->request->getSession()->read('Auth.User.first_name');?></span>
                                    <span class="sidebar-normal"> <?php echo $this->request->getSession()->read('Auth.User.surname');?> </span></center></strong>
                                  </a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" href="#"><center>
                                    <span class="sidebar-mini"> <?php echo $this->request->getSession()->read('Auth.User.school');?> </span></center>
                                  </a>
                                </li>
                              </ul>
                            </div>
                          </div>

        <?php if ($this->request->getSession()->read('Auth.User')): ?>
        <?php if ($this->request->getSession()->read('Auth.User.role') == 'teacher' ) { ?>
          <li class="nav-item">
              <?php echo $this->Html->link('Students', ['controller' => 'teacher', 'action' => 'viewstudents', '_full' => true],['class' => 'nav-link'])?>
          </li>
          <li class="nav-item">
              <?php echo $this->Html->link('Classes', ['controller' => 'teacher', 'action' => 'teacherclassmgmt', '_full' => true],['class' => 'nav-link'])?>
          </li>

        </li>
<!--              <li class="nav-item">-->
<!--                <a class="nav-link" href="#">-->
<!--                  <span>Enrol My Class to Units(Coming soon)</span>-->
<!---->
<!--                </a>-->
<!--              </li>-->
<!---->
<!--              <li class="nav-item">-->
<!--                <a class="nav-link" href=" ">-->
<!--                  <span>My Students' Progress(Coming soon)</span></a>-->
<!--              </li>-->

          <?php }?>
        <?php if ($this->request->getSession()->read('Auth.User.role') == 'admin' ) { ?>
        <li class="nav-item">
          <?php echo $this->Html->link('Students', ['controller' => 'teacher', 'action' => 'viewstudents', '_full' => true],['class' => 'nav-link'])?>
        </li>
        <li class="nav-item">
          <?php echo $this->Html->link('Classes', ['controller' => 'teacher', 'action' => 'teacherclassmgmt', '_full' => true],['class' => 'nav-link'])?>
        </li>
<!--        <li class="nav-item">-->
<!--          <a class="nav-link" href="#">-->
<!--            <span>Enrol My Class to Units(Coming soon)</span>-->
<!---->
<!--          </a>-->
<!--        </li>-->
<!---->
<!--        <li class="nav-item">-->
<!--          <a class="nav-link" href=" ">-->
<!--            <span>My Students' Progress(Coming soon)</span></a>-->
<!--        </li>-->
<!--        <li class="nav-item">-->
<!--          <a class="nav-link" href=" ">-->
<!--            <span>Purchase Class Subscription(Coming soon)</span></a>-->
<!--        </li>-->
        <?php }?>
        <?php if ($this->request->getSession()->read('Auth.User.role') == 'unverified' ) { ?>
        <li class="nav-item">
          <?php echo $this->Html->link('More Details', ['controller' => 'teacher', 'action' => 'contact', '_full' => true, $this->request->getSession()->read('Auth.User.id')],['class' => 'nav-link'])?>
        </li>
        <?php }?>
          <?php endif; ?>
            </ul>


      <div id="content-wrapper">

        <div class="container-fluid">


              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>

        <!-- /.container-fluid -->

      <?= $this->fetch('content') ?>
                    </tr>
                  </thead>
                </table>
              </div>
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
     $('.myTable').DataTable();
 } );
 </script>


  </body>
  <?= $this->element('footer') ?>
</html>

