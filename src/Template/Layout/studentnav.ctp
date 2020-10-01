<?php
/**
 * Created by PhpStorm.
 * User: Anthony
 * Date: 21/10/2018
 * Time: 6:22 PM
 */?>
 <?= $this->Html->css('style-2.css') ?>
 <div class="header">
     <div class="container">
     <div class="image1">

         <div class="nav mobile">
             <?= $this->Html->image('RGBreverse2.png',['url' => ['controller' => 'pages', 'action' => 'home'], 'class' => 'nav-img']); ?>
             <ul>
                 <li><?= $this->Html->link(
                     'About',
                     ['controller' => 'pages', 'action' => 'about', '_full' => true]
                     );?></li>
                 <li><?= $this->Html->link(
                     'Contact',
                     ['controller' => 'users', 'action' => 'enquiry', '_full' => true]
                     );?></li>

                 <?php if ($this->request->getSession()->read('Auth.User')): ?>
                 <?php if ($this->request->getSession()->read('Auth.User.role') == 'admin' ) { ?>
                 <li><?= $this->Html->link(
                     'Dashboard',
                     ['controller' => 'users', 'action' => 'home', '_full' => true]
                     );?></li>
                 <li><?= $this->Html->link(
                     'Logout',
                     ['controller' => 'users', 'action' => 'logout', '_full' => true]
                     );?></li>
                 <?php }?>
                 <?php if ($this->request->getSession()->read('Auth.User.role') == 'teacher' ) { ?>
                 <li><?= $this->Html->link(
                     'Dashboard',
                     ['controller' => 'teacher', 'action' => 'home', '_full' => true]
                     );?></li>
                 <li><?= $this->Html->link(
                     'Logout',
                     ['controller' => 'users', 'action' => 'logout', '_full' => true]
                     );?></li>
                 <?php }?>
                 <?php if ($this->request->getSession()->read('Auth.User.role') == 'student' ) { ?>
                 <li><?= $this->Html->link(
                     'Dashboard',
                     ['controller' => 'student', 'action' => 'dashboard', '_full' => true]
                     );?></li>
                 <li><?= $this->Html->link(
                     'Profile',
                     ['controller' => 'student', 'action' => 'profile', '_full' => true, $this->request->getSession()->read('Auth.User.id')]
                     );?></li>

                 <li><?= $this->Html->link(
                     'Logout',
                     ['controller' => 'users', 'action' => 'logout', '_full' => true]
                     );?></li>
                 <?php }?>
                 <?php if ($this->request->getSession()->read('Auth.User.role') == 'unverified' ) { ?>
                 <li><?= $this->Html->link(
                     'Dashboard',
                     ['controller' => 'teacher', 'action' => 'home', '_full' => true]
                     );?></li>

                 <li><?= $this->Html->link(
                     'Logout',
                     ['controller' => 'users', 'action' => 'logout', '_full' => true]
                     );?></li>
                 <?php }?>
                 <?php else: ?>
                 <li><?= $this->Html->link(
                     'Free Trial',
                     ['controller' => 'users', 'action' => 'register', '_full' => true]
                     );?></li>
                 <li><?= $this->Html->link(
                     'Login',
                     ['controller' => 'users', 'action' => 'login', '_full' => true]
                     );?></li>
                 <?php endif; ?>
                 <li><?= $this->Html->image('LT-Token.png',["title"=>"Tokens Available","style" => "margin-right: 8px", 'alt' => 'Tokens Available']);?>
                     <?php if($this->request->getSession()->read('Auth.User.unit_token') == null)
                     {
                         ?><i style = "font-size: 15px;font-family: 'Rubik', sans-serif "> x0</i><?php
                     }
                     else{
                         ?><i style = "font-size: 15px;font-family: 'Rubik', sans-serif "> x<?= $this->request->getSession()->read('Auth.User.unit_token'); ?></i><?php
                     }

                         ?>
                 </li>


             </ul>
         </div>
     </div>
     </div>
<head>
    <?php echo $this->Html->css('admin'); ?>
    <!-- Bootstrap core CSS-->
    <?php echo $this->Html->css('vendor/bootstrap/css/bootstrap.min.css'); ?>

    <!-- Custom fonts for this template-->
    <?php echo $this->Html->css('vendor/fontawesome-free/css/all.min.css'); ?>

    <!-- Custom styles for this template-->
    <?php echo $this->Html->css('sb-admin.css'); ?>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">

</head>



<?= $this->Flash->render() ?>
<?= $this->fetch('content') ?>