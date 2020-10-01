<?php
/**
 * @var \App\Model\Entity\User $user
 * @var App\Model\Entity\Role $role
 */
?>

<?= $this->Html->css('style-2.css') ?>
<div class="header">

    <div class="container">

        <?= $this->Html->image('RGBreverse2.png',['url' => ['controller' => 'pages', 'action' => 'home'], 'class' => 'nav-img']); ?>

        <div class="nav mobile">
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
            </ul>
        </div>
    </div>
    </div>
