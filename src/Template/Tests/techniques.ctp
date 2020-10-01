<!doctype html>
<head>
<style>
div.logo {
	position: absolute; 
	left: 0; 
	top: 0;
}

.tecHead {
  position: relative;
  display: inline-block;
  padding-left: 200px;
  padding-right: 200px;
  margin-top: 20px;
  margin-left: 100px;
  margin-right: 100px;
  text-align: left;
  float: left;
}
ul.unitBody{
	list-style-type: none;
	margin: 0;
	padding: 0;
}

div.tecPic{
	position: relative;
	bottom: 100px;
}

div.tecBody{
    position: relative;
	bottom: 160px;
	display: inline-block;
    padding-left: 200px;
    padding-right: 200px;
    margin-top: 20px;
    margin-left: 100px;
    margin-right: 100px;
    text-align: left;
	float: left;
}
div.leftcol{
	width: 100px;
}
p.push{
	position: relative;
	bottom: 120px;
}

body { min-width: 750px; }
</style>

<header>
<div align="right">
<font size="3">Welcome User | My Details | Contact Us | Logout</font>
</div>

<div class = "tecHead" align="center">
<h1 align = "center" >Student Dashboard</h1>
<h2 align = "center" >Techniques</h2>
<p>To understand a conversation properly you need to hear and understand specific details, the main gist as well as people's attitudes, emotions and opinions. Depending on your fluency, you will be able to focus on parts or all of those elements.

When doing an exercise you can choose to test yourself or to learn how to listen by practising a new technique.

We've separated them into three categories: Technique 1, 2 or 3.</p>
</div>
</header>
<div class = "logo">
<img src="<?php echo $this->request->webroot; ?>img/logo.png" alt="Logo" width="200" height="200" >
</div>
</head>

<body>
<div class "leftCol" align = "left">
<h3>My Unit Sections</h3>

<ul class = "unitBody">
	<li>Section 1</li>
	<li>Section 2</li>
	<li>Section 3</li>
	<li>Section 4</li>
	<li>Section 5</li>
</ul>
</div>
<div class = "tecPic" align = "center">
<button onclick="but1()" id ="but1" ><img src="<?php echo $this->request->webroot; ?>img/t1-icon.png" alt="Logo" width="80" height="80" ></button>
<button onclick="but2()"><img src="<?php echo $this->request->webroot; ?>img/t2-icon.png" alt="Logo" width="80" height="80" ></button>
<button onclick="but3()"><img src="<?php echo $this->request->webroot; ?>img/t3-icon.png" alt="Logo" width="80" height="80" ></button>

<p class = "push"><font size="2"> Push a Button! </font></p>

</div>
<div class = "tecBody" align = "center">
<img id = "tecBodyPic" src = "">
<p id = "tecBody"></p>
</div>

<script>
function but1() {
   document.getElementById("tecBodyPic").src = "<?php echo $this->request->webroot; ?>img/t1-icon.png";
   document.getElementById("tecBody").innerHTML = "Sometimes when you listen to a recording, you can only focus on hearing individual words and translating them. When that happens, you have to take notes because you can only retain 10 seconds in your head. When the recording is finished you go over your notes and try and work out what the conversation or presentation was about. If you are in this situation: GREAT! because in 15 minutes you will have learnt something new and improved in French! If you are reading this you are interested in doing something else than testing yourself, you actually would like to learn new expressions, new ideas and how to listen. When you are doing an exercise that requires 100% attention from you to understand the words, apply a T1 Technique. The more you practise these techniques, the better you will get at using them in an exam situation.";
}
function but2() {
	document.getElementById("tecBodyPic").src = "<?php echo $this->request->webroot; ?>img/t2-icon.png";
	document.getElementById("tecBody").innerHTML = "If the recording you have heard is mildly difficult for you then you should practise using one the T2 Techniques. T2 techniques focus on making sense of the context of the conversation: analysing and interpreting the words you heard (as opposed to recognising words) and understanding what is the speaker's intention.";
}
function but3() {
	document.getElementById("tecBodyPic").src = "<?php echo $this->request->webroot; ?>img/t3-icon.png";
	document.getElementById("tecBody").innerHTML = "Whatever the level of the exercise, there are skills and techniques that you should practise regularly: Think positively - this has a proven effect on helping you listen betterRe-read the vocabulary list provided before doing an exercise and add your own words and expressionsListen to a recording 4, 5, 6… times until you feel you can't understand anymore";
}
</script>

</body>


