<html>
  <head>
    <?= $this->Html->css('feedback') ?>

    <title>Feedback Page</title>
  </head>

<body>
<header>
<div align="right">
<font size="3">Welcome User | My Details | Contact Us | Logout</font>
</div>

</header>

<ul class="info">
<li>Started On: </li>
<li>Status: </li>
<li>Finished On: </li>
<li>Time Taken: </li>
<li>Grade: </li>
</ul>

<div class = "logo">
 <?php echo $this->Html->image('logo.png', array('width' => '200px','height' =>'200px','allign'=>'right','alt'=>'logo')); ?>
</div>

</head>

<body>

<div class = "leftcol" align = "left">

<h3>My Unit Sections</h3>

<ul class="unitbutton">
  <li><button onclick="button1()">Unit 1</button></li>
  <li><button id="exercisebutton" style="display: none"> - Exercise 1</button></li>
  <li><button onclick="button2()">Unit 2</button></li>
  <li><button onclick="button3()">Unit 3</button></li>
</ul>

</div>

    <audio controls>
      <source src="<?= h($exercise->exerciseAudioPath)?>" type="audio/mpeg">
      Your browser does not support the audio element.
    </audio>


 <ol class="multiqs">
                <li>
                    <h3>Q1. Lorem ipsum dolor sit amet ?</h3>
                    <div>
                        <input type="radio" name="question-1-answers" id="question-1-answers-A" value="A" />
                        <label for="question-1-answers-A">A) Lorem ipsum dolor sit amet </label>
                    </div>
                    <div>
                        <input type="radio" name="question-1-answers" id="question-1-answers-B" value="B" />
                        <label for="question-1-answers-B">B) Lorem ipsum dolor sit amet</label>
                    </div>
                    <div>
                        <input type="radio" name="question-1-answers" id="question-1-answers-C" value="C" />
                        <label for="question-1-answers-C"><font color="lightgreen">A) Lorem ipsum dolor sit amet</font></label>
                    </div>
                    <div>
                        <input type="radio" name="question-1-answers" id="question-1-answers-D" value="D" />
                        <label for="question-1-answers-D"><font color="red">A) Lorem ipsum dolor sit amet</font></label>
                    </div>
                </li>
                <br><br>
                       <li> <div class="feedback">....feedback....</div> </li>
    </ol><br>
 <ol class="multiqs">
                <li>
                    <h3>Q2. Lorem ipsum dolor sit amet ?</h3>
                    <div>
                        <input type="radio" name="question-1-answers" id="question-1-answers-A" value="A" />
                        <label for="question-1-answers-A">A) Lorem ipsum dolor sit amet </label>
                    </div>
                    <div>
                        <input type="radio" name="question-1-answers" id="question-1-answers-B" value="B" />
                        <label for="question-1-answers-B"><font color="lightgreen">A) Lorem ipsum dolor sit amet</font></label>
                    </div>
                    <div>
                        <input type="radio" name="question-1-answers" id="question-1-answers-C" value="C" />
                        <label for="question-1-answers-C">C) Lorem ipsum dolor sit amet</label>
                    </div>
                    <div>
                        <input type="radio" name="question-1-answers" id="question-1-answers-D" value="D" />
                        <label for="question-1-answers-D">D) Lorem ipsum dolor sit amet</label>
                    </div>
                </li>
                <br><br>
                <li> <div class="feedback">....feedback....</div> </li>
    </ol><br>
<ol class="multiqs">
    <li><h3>Q3. Lorem ipsum dolor sit amet : </h3></li>
<div class="shortanswer"> answer </div>
<br><br>
                <li> <div class="feedback">....feedback....</div> </li>
</ol><br>



<ul class="rightpanel">
       <li><button class="rightbtn"><?=$this->Html->image('t1-icon.png', ['alt' => 't1'])?></button></li>
       <li><button class="rightbtn"><?=$this->Html->image('t2-icon.png', ['alt' => 't2'])?></button></li>
       <li><button class="rightbtn"><?=$this->Html->image('t3-icon.png', ['alt' => 't3'])?></button></li>
       <li><button class="rightbtn"><?=$this->Html->image('mynotes-icon.png', ['alt' => 'mynotes'])?></button></li>
       <li><button class="rightbtn"><?=$this->Html->image('script-icon.png', ['alt' => 'script'])?></button></li>
       <li><button class="rightbtn"><?=$this->Html->image('cultural-icon.png', ['alt' => 'cultural'])?></button></li>
</ul>

<button class="finishbtn">Finish Review
</button>

</body>

<script>
    function button1() {
        var x = document.getElementById("exercisebutton");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }

    }
</script>

