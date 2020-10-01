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

<body>
  <div class="container">
    <div class = "row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <div>
          <h2 class="post-title" style="text-align: center;">Past Attempts</h2><hr>
        </div>

        <div>
          <p style="text-align: center; margin: 0px px 20px 20px;"> Select which section you'd like to check your results for: </p>
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
                         <!--<button onclick = 'toggleS".$x."()'><b>".$allSections[$x]."</b></button>-->
                        <a class='secbutton' href=\"#unit\"， onclick='toggleS".$x."()'><b>".$allSections[$x]."</b></a>


                    </p>

                  </div>
                </div>
              </div>";
            }
            ?>
          </div>
        </div>
        <?php
          $allUnits = array();
          $allExercises = array();
        ?>
        <section id='unit'>
          <!-- Creates all the units -->
          <?php for($y = 0; $y < 5; $y++){
            echo "<div class='allSections' id='s".$y."' style='display:none'>";
              echo "<hr>";
              echo "<h2 class='post-title'>".$allSections[$y]." attempts</h2>";

              //Now loop through to show each unit
              foreach($units as $unit){
                  if($unit->section->section == $allSections[$y]){
                    echo "<div>";
                      echo "<button onclick='toggleU".$unit->id."()'><b>$unit->name</b></button>";
                    echo "</div>";
                    echo "<div class = 'allUnits' id='u".$unit->id."' style='display:none'>";
                      array_push($allUnits, $unit->id);
                      $exerciseCounter = 0;
                      foreach($unit->exercises as $exercise){
                        echo "<div>";
                          echo "<button onclick='toggleE".$exercise->id."()'>".$exercise->name."</button> ";
                          echo "<div class = 'allExercises' id='e".$exercise->id."' style='display:none'>";
                          array_push($allExercises, $exercise->id);
                          $all_attempts_limit10 = $all_attempts->where(['exercise_id' => $exercise->id])->limit(10);
                          if($all_attempts_limit10->count() != 0){
                            foreach($all_attempts_limit10 as $the_attempt){
                            echo "<a ".$this->Html->link(h($the_attempt->attempt_date), ['controller' => 'ExerciseAttempts', 'action' => 'past_attempt/'.h($the_attempt->id)])."</a>";
                            echo "<br>";
                            }
                          } else {
                            echo "You have no attempts for this exercise!";
                          }
                          echo "</div>";
                        echo "</div>";
                        $exerciseCounter++;
                      }
                      if($exerciseCounter == 0){
                          echo "There are no exercises for this unit.";
                      }
                    echo "</div>";
                  }
              }
            echo "</div>";
          }
          ?>
        </section>
        </div>
      </div>
    </div>
  </div>
<script>

  var allTheSections = document.getElementsByClassName('allSections');
  var allTheUnits = document.getElementsByClassName('allUnits');
  var allTheExercises = document.getElementsByClassName('allExercises');

<?php
  //Sections management
  echo "function hideAllSections(){
    var numOfSections = allTheSections.length;
    for(x=0; x < numOfSections; x++){
      allTheSections[x].style.display = 'none';
    }
  }";

  for($x = 0; $x < 5; $x++){
    echo "function toggleS".$x."(){
      var the_section = document.getElementById('s".$x."');
      if(the_section.style.display == 'block'){
        hideAllSections();
      } else {
        hideAllSections();
        the_section.style.display = 'block';
      }
    }";
  }

  //Units Management
  echo "function hideAllUnits(){
    var numOfUnits = allTheUnits.length;
    for(x = 0; x < numOfUnits; x++){
      allTheUnits[x].style.display = 'none';
    }
  }";

  for($x = 0; $x < sizeof($allUnits); $x++){
    echo "function toggleU".$allUnits[$x]."(){
      var the_unit = document.getElementById('u".$allUnits[$x]."');
      if(the_unit.style.display == 'block'){
        hideAllUnits();
      } else {
        hideAllUnits();
        the_unit.style.display = 'block';
      }
    }";
  }

    //Exercise Management
    echo "function hideAllExercises(){
      var numOfExercises = allTheExercises.length;
      for(x = 0; x < numOfExercises; x++){
        allTheExercises[x].style.display='none';
      }
    }";

    for($x = 0; $x < sizeof($allExercises); $x++){
      echo "function toggleE".$allExercises[$x]."(){
        var the_exercise = document.getElementById('e".$allExercises[$x]."');
        if(the_exercise.style.display == 'block'){
          hideAllExercises();
        }else{
          hideAllExercises();
          the_exercise.style.display = 'block';
        }
      }";
  }

?>
</script>
</body>

<?php foreach($all_attempts->order(["exercise_id" => "asc"]) as $attempt) debug ($attempt); ?>
