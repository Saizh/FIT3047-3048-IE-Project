<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Network\Exception\NotFoundException;


$cakeDescription = 'CakePHP: the rapid development PHP framework';
?>
<!DOCTYPE html>
<html>
<head>

<?= $this->Html->css('sectionPage.css') ?>
<title>Section</title>

<header>
<div align="right">
<font size="3">Welcome User | My Details | Contact Us | Logout</font>
</div>


</header>



<div class = "logo">
<?=$this->Html->image('logo.png', ['alt' => 'logo'])?>
</div>

</head>

<body>

<div class = "leftcol" align = "left">

<h3>Sections</h3>


<ul class="unitbutton">
  <li><button onclick="display1()">Unit 1</button></li>
  <li><button onclick="display2()">Unit 2</button></li>
  <li><button onclick="display3()">Unit 3</button></li>
</ul>

</div>



<div class="clickShow" id="exercise" style="display:none">
<a <?php echo $this->Html->link('Exercise 1', ['controller' => 'Exercises', 'action' => 'get/2'])?></a> <br>


</div>




<ul class="rightpanel">
       <li><button class="rightbtn"><?=$this->Html->image('t1-icon.png', ['alt' => 't1'])?></button></li>
       <li><button class="rightbtn"><?=$this->Html->image('t2-icon.png', ['alt' => 't2'])?></button></li>
       <li><button class="rightbtn"><?=$this->Html->image('t3-icon.png', ['alt' => 't3'])?></button></li>

</ul>


</body>

<script>
    function display1() {
        var x = document.getElementById("exercise");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }

    }
    function display2() {
            var x = document.getElementById("exercise");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }

        }
    function display3() {
                var x = document.getElementById("exercise");
                if (x.style.display === "none") {
                    x.style.display = "block";
                } else {
                    x.style.display = "none";
                }

            }
</script>

