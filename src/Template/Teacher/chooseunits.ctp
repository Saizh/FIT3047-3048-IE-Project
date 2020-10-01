<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">


    <!-- Bootstrap core CSS -->
    <?php echo $this->Html->css('vendor/bootstrap/css/bootstrap.min.css'); ?>

    <!-- CSS for dashboard -->
    <?php echo $this->Html->css('student-dashboard.css')?>

    <!-- Custom fonts for this template -->
    <?php echo $this->Html->css('weboot/css/vendor/fontawesome-free/css/all.min.css') ?>
    <?php echo $this->Html->css('https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic') ?>
    <?php echo $this->Html->css('https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,80') ?>

    <!-- Custom styles for this template -->
<!---->
<!--    --><?php //echo $this->Html->css('clean-blog.css'); ?>

    <!-- Scripts for this template -->
    <?php echo $this->Html->script('student-dashboard.js');?>

</head>

<body>
<?= $this->Flash->render() ?>
<?php if (($class->subscription) == 'trial' ) { ?>
<h2 class="post-title"> This class does not have a full subscription</h2>
    <div></div>

    <?= $this->element('purchase', ['url' => ['action' => 'classpurchase', $class->class_id]]) ?>
<?php }?>

<?php if (($class->subscription) == 'full' ) { ?>
<!-- Main Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">


            <section id='sections'>
                <div class="post-preview">
                    <h2 class="post-title">Choose Units for this Class</h2>
                    <p>You can choose <?=($class->unit_token)?> more units for this class</p>

                    <div class="album py-5">
                        <div class="container">

                            <div class="row">

                                <?php $images = array($this->Html->image('section1.jpg',['alt' => 'section1']),
                                    $this->Html->image('section2.jpg',['alt' => 'section2']),
                                    $this->Html->image('section3.jpg',['alt' => 'section3']),
                                    $this->Html->image('section4.jpg',['alt' => 'section4']),
                                    $this->Html->image('section5.jpg',['alt' => 'section5']));  //This is all the images

                                $allSections = array($section1, $section2,$section3, $section4, $section5); //This is all the sections put into an array

                                //We need to keep track of the ids for each units (needed for scripts later)
                                $allUnits = array();

                                for($x = 0; $x < 5; $x++){
                                    echo "<div class='col-md-4'>
                          <div class='card mb-4 box-shadow'>
                            <img class='card-img-top' ".$images[$x]."
                            <div class='card-body'>
                              <p class='card-text'>

                                   <!-- <button onclick = 'getSection".$x."()'><b>".$allSections[$x]."</b></button>-->
                                 <a class='secbutton' onclick='getSection".$x."()'><b>".$allSections[$x]."</b></a>



                              </p>

                            </div>
                          </div>
                        </div>";

                                }
                                ?>


                            </div>
                        </div>
                    </div>

                </div>

                <!-- Creates the different Sections -->
                <section id='unit'>
                    <?php for($x = 0; $x < 5; $x++){
                        echo "<div class='allSections' id='s".$x."' style='display:none'>";
                        echo "<hr>";
                        echo "<h2 style='text-align:left'>".$allSections[$x]."</h2>";
                        echo "<br>";

                        //Now loop through to show each unit
                        foreach($units as $unit){
                            if($unit->section->section == $allSections[$x]){
                                echo "<div class='dropdown'>";

                                echo "<li><a ".$this->Html->link(h($unit->name), ['controller' => 'Exercises', 'action' => 'choose/'.h($unit->id), h($class->class_id)])."</a ></li>";
                                $newItem = array($x, $unit->id);
                                array_push($allUnits, $newItem);

                                echo "</div>";
                                echo "<div class = 'allUnits' id='u".$unit->id."' style='display:none'>";
                                echo "<ul class='horizontal'>";
                                $exerciseCounter = 0;
                                foreach($unit->exercises as $exercise){
                                    echo "<li class='drop-content'>";
                                    echo "<a ".$this->Html->link(h($exercise->name), ['controller' => 'Exercises', 'action' => 'choose/'.h($exercise->id), h($class->class_id)])."</a >";
                                    echo "</li>";
                                    $exerciseCounter++;
                                }
                                if($exerciseCounter == 0){
                                    echo "There are no exercises for this unit.";
                                }
                                echo "</ul>";
                                echo "</div>";
                            }
                        }
                        echo "</div>";
                    }
                    ?>

                </section>


                <hr>
                <br>








                <!-- Programmatically making scripts -->
                <?php
                echo "<script>";
                // this is for the sections
                echo "var sections = document.getElementsByClassName('allSections');";

                //This hides all the sections
                echo "function hideAll() {

                for(var x = 0; x < sections.length; x++){
                  sections[x].style.display = 'none';
                }
              }";

                for($x = 0; $x < count($allSections); $x++){
                    //Creates functions for each section
                    echo "var section".$x." = document.getElementById('s".$x."');";

                    echo "function getSection".$x."(){
                  if(section".$x.".style.display == 'none'){
                    hideAll();
                    section".$x.".style.display='block';
                    section".$x.".scrollIntoView();
                  } else {
                    hideAll();
                  }
                }";
                }

                echo "</script>";


                echo "<script>";
                //This is for the units
                echo "var allUnits = document.getElementsByClassName('allUnits');";


                //This hides all the units
                echo "function hideAllUnits() {
              for(var x = 0; x < allUnits.length; x++){
                allUnits[x].style.display = 'none';
              }
            }";

                for($x = 0; $x < count($allUnits); $x++){

                    //Gets the id of the unit
                    echo "var unit".$x." = document.getElementById('u".$allUnits[$x][1]."');";

                    //function to show it
                    echo "function s".$allUnits[$x][0]."u".$allUnits[$x][1]."(){
                if(unit".$x.".style.display == 'none'){
                  hideAllUnits();
                  unit".$x.".style.display='block';
                } else {
                  hideAllUnits();
                }
              }";
                }
                echo "</script>";


                ?>

                <!-- Pager -->

        </div>
    </div>
</div>
<?php }?>

<hr>



<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Custom scripts for this template -->
<script src="js/clean-blog.min.js"></script>

</body>

</html>
