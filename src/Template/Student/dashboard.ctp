<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Student Dashboard</title>

    <!-- Bootstrap core CSS -->
    <?php echo $this->Html->css('vendor/bootstrap/css/bootstrap.min.css'); ?>

    <!-- CSS for dashboard -->
    <?php echo $this->Html->css('student-dashboard.css')?>

    <!-- Custom fonts for this template -->
    <?php echo $this->Html->css('weboot/css/vendor/fontawesome-free/css/all.min.css') ?>
    <?php echo $this->Html->css('https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic') ?>
    <?php echo $this->Html->css('https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,80') ?>

    <!-- Custom styles for this template -->

    <?php echo $this->Html->css('clean-blog.css'); ?>

    <!-- Scripts for this template -->
    <?php echo $this->Html->script('student-dashboard.js');?>

</head>

<body>


<!-- Page Header -->
<header class="masthead " style="margin-top: 10px">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-10 mx-auto" style="height:300px">
                <div class="site-heading" style="padding-top: 100px">
                    <h1>Bonjour <?php echo $this->request->getSession()->read('Auth.User.first_name');?></h1>
                    <span class="subheading">Welcome to Language Tub!</span>
                    <p></p><p></p>
                    <a class="btn btn-light btn-sm js-scroll-trigger" href="#sections" style="padding-left: 10px; padding-right: 10px">My Sections</a>
                    <a class="btn btn-light btn-sm js-scroll-trigger" href="#tech" style="padding-left: 10px; padding-right: 10px">Techniques & tools</a>
                    <a class="btn btn-light btn-sm js-scroll-trigger" href="#subscription" style="padding-left: 10px; padding-right: 10px">My Subscription</a>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Main Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">


            <section id='sections'>
                <div class="post-preview">
                    <h2 class="post-title">My Sections</h2>

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
                      <div class='col-md-4'>
                        <div class='card mb-4 box-shadow'>

                          <!--<img class='card-img-top' src="/img/attempt.jpg" style="width:171px;height:140px;" >-->
                          <?= $this->Html->image('attempt.jpg',['class' => 'card-img-top', 'style' => 'width:171px;height:140px;']); ?><!-- image here -->
                          <div class='card-body'>
                            <p class='card-text'>
                              <?php echo "<b><a class='secbutton' ".$this->Html->link("Past Attempts", ['controller' => 'ExerciseAttempts', 'action' => 'all_attempts'])."</a></b>"; ?>
                            </p>

                          </div>
                        </div>
                      </div>

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
                                echo "<button class='dropbtn' onclick='s".$x."u".$unit->id."()'><b>$unit->name</b></button>";  //onclick is organised as section (s) then unit (u)
                                $newItem = array($x, $unit->id);
                                array_push($allUnits, $newItem);

                                echo "</div>";
                                echo "<div class = 'allUnits' id='u".$unit->id."' style='display:none'>";
                                echo "<ul class='horizontal'>";
                                $exerciseCounter = 0;
                                foreach($unit->exercises as $exercise){
                                    echo "<li class='drop-content'>";
                                    echo "<a ".$this->Html->link(h($exercise->name), ['controller' => 'Exercises', 'action' => 'get/'.h($exercise->id)])."</a >";
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

                <section id='tech'>
                    <div class = "technique" style="display: block">
                        <div class="post-preview" >
                            <h2 class="post-title">
                                Techniques & Tools
                            </h2><br>
                            <p class="post-meta">
                                To understand a conversation properly you need to hear and understand specific details, the main gist as well as people's attitudes, emotions and opinions. Depending on your fluency, you will be able to focus on parts or all of those elements.

                                When doing an exercise you can choose to test yourself or to learn how to listen by practising a new technique.

                                We've separated them into three categories: Technique 1, 2 or 3.</p>
                        </div>

                        <hr>

                        <div class="post-preview">
                            <button onclick="but1()"><?php echo $this->Html->image('t1-icon.png', array('width' => '80px','height' => '80px','alt'=>'t1')); ?>
                                <button onclick="but2()"><?php echo $this->Html->image('t2-icon.png', array('width' => '80px','height' =>'80px','alt'=>'t2')); ?>
                                    <button onclick="but3()"><?php echo $this->Html->image('t3-icon.png', array('width' => '80px','height' => '80px','alt'=>'t3')); ?>
                        </div>

                        <hr>

                        <div class="post-preview">
                            <div align="left">
                                <?= $this->html->image('t1-icon.png', ['style' => 'display:none', 'id' => 'tecBodyPic']); ?>
                                <?= $this->html->image('t2-icon.png', ['style' => 'display:none', 'id' => 'tecBodyPic2']); ?>
                                <?= $this->html->image('t3-icon.png', ['style' => 'display:none', 'id' => 'tecBodyPic3']); ?>
                                <p class='tech' id="tecBody" style="display: none"><?= nl2br(h($tec1)); ?></p>
                                <p class='tech' id="tecBody2" style="display: none"><?= nl2br(h($tec2)); ?></p>
                                <p class='tech' id="tecBody3" style="display: none"><?= nl2br(h($tec3)); ?></p>
                            </div>
                        </div>
                    </div>

                </section>

                

          <section id='subscription'>
              <div class = "technique" style="display: block">
                  <br><h2 class="post-title">
                      My Subscription
                  </h2><br>

                  <?php if ($this->request->getSession()->read('Auth.User')): ?>
                  <?php if ($this->request->getSession()->read('Auth.User.subscription') == 'trial' ) { ?>

                <div class="jumbotron">
                                      <h1 class="display-4">Trial Account</h1>
                                      <p>Buy full subscription for $66.00</p>
                                      <hr class="my-4">
                                      <p class="lead">
                                     </p>
                                       <?= $this->Html->link(__('Full Subscription'), ['controller' => 'student', 'action' => 'purchase', '_full' => true, $this->request->getSession()->read('Auth.User.id')], ['class' => 'btn btn-primary btn-lg']) ?>

                                    </div>

                  <?php }?>

                  <?php if ($this->request->getSession()->read('Auth.User.subscription') == 'full' ) { ?>

                    <div class="jumbotron">
                                      <h1 class="display-4">Full Subscription</h1>
                                      <p class="lead">Expires on: <?=($this->Time->format($this->request->getSession()->read('Auth.User.expiry'), 'dd-MM-yyyy'))?></p>
                                      <hr class="my-4">
                                      <p>You can choose <?=($this->request->getSession()->read('Auth.User.unit_token'))?> more units</p>
                                      <p>Buy one extra unit for $7.00</p>
                                      <p> Or buy Ten extra units for only $50.00</p>

                                      <p class="lead">

                                      </p>
                                       <?= $this->Html->link(__('Buy Extra UniT'), ['controller' => 'student', 'action' => 'purchaseextra', '_full' => true, $this->request->getSession()->read('Auth.User.id')], ['class' => 'btn btn-primary btn-lg']) ?>
                        <?= $this->Html->link(__('Buy ten Extra UniTs'), ['controller' => 'student', 'action' => 'tenunits', '_full' => true, $this->request->getSession()->read('Auth.User.id')], ['class' => 'btn btn-primary btn-lg']) ?>

                                    </div>
                  <?php }?>
                  <?php endif; ?>

              </div>

          </section>

          <script>


             var pic1 = document.getElementById("tecBodyPic")
             var tec1 = document.getElementById("tecBody")
             var pic2 = document.getElementById("tecBodyPic2")
             var tec2 = document.getElementById("tecBody2")
             var pic3 = document.getElementById("tecBodyPic3")
             var tec3 = document.getElementById("tecBody3")
             var records=document.getElementById("records")


             function showRecords(){

                              if(records.className == "invisible"){
                                  recordVisible();
                              }
                              else {
                                  records.className = "invisible";
                              }
             }
             function recordVisible(){
               records.className = "pre.visible";
               records.className = "visible";
             }


             function but1() {
                          if(tec1.style.display === "none"){
                             pic1.style.display ="block"
                             pic2.style.display ="none"
                             pic3.style.display = "none"
                             tec1.style.display ="block"
                             tec2.style.display ="none"
                             tec3.style.display="none"
                             }
                          else{
                             pic1.style.display = "none"
                             tec1.style.display = "none"}

                         }
                       function but2() {
                             if(pic2.style.display === "none"){
                                  pic2.style.display ="block"
                                  pic1.style.display ="none"
                                  pic3.style.display = "none"
                                  tec1.style.display ="none"
                                  tec2.style.display ="block"
                                  tec3.style.display="none"
                                  }
                             else{
                                   pic2.style.display = "none"
                                   tec2.style.display = "none"}

                       }
                       function but3() {
                             if(pic3.style.display === "none"){
                                  pic2.style.display ="none"
                                  pic1.style.display ="none"
                                  tec1.style.display ="none"
                                  tec2.style.display ="none"
                                  tec3.style.display="block"
                                  pic3.style.display = "block"
                                  }
                             else{
                                   pic3.style.display = "none"
                                   tec3.style.display = "none"}
                       }

          </script>

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

<hr>



<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Custom scripts for this template -->
<script src="js/clean-blog.min.js"></script>

</body>

</html>
