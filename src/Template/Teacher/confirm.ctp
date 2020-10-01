<!-- Bootstrap core CSS -->
<?php echo $this->Html->css('vendor/bootstrap/css/bootstrap.min.css'); ?>

<!-- CSS for dashboard -->
<?php echo $this->Html->css('student-dashboard.css')?>

<!-- Custom fonts for this template -->
<?php echo $this->Html->css('weboot/css/vendor/fontawesome-free/css/all.min.css') ?>
<?php echo $this->Html->css('https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic') ?>
<?php echo $this->Html->css('https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,80') ?>

<!-- Custom styles for this template -->



<body>
<div class="container">
    <div class = "row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <div style="margin-top:20px">
                <h2 class="post-title" style="text-align:center">Confirm Page</h2><hr>
            </div>

            <div style="text-align:center">
                <p> Do you want to choose this unit ? </p>

                <?php echo "<a class='confirmbtn1' style='margin-right:10px' ".$this->Html->link("Yes", ['action' => 'tokenspend/'.h($ex_id), h($class->class_id)])."</a ></b>"; ?>
                <?php echo "<a class='confirmbtn2' ".$this->Html->link("No", ['controller' => 'teacher', 'action' => 'chooseunits/'.h($class->class_id)])."</a ></b>"; ?>



            </div>

</body>