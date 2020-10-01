<?php
/**
 * @var \App\Model\Entity\User $user
 * @var App\Model\Entity\Role $role
 */
?>

<?= $this->Html->css('style-2.css') ?>




<div class="header">

    <div class="container" >
    <div class="image1" >

        <?= $this->Html->image('RGBreverse2.png',['url' => ['controller' => 'pages', 'action' => 'home'], 'class' => 'nav-img-2']); ?>
            </div>

        <div class="nav mobile">
            <ul>
                <?php if ($this->request->getSession()->read('Auth.User')): ?>
                <?php if ($this->request->getSession()->read('Auth.User.role') == 'admin' ) { ?>
                <li><?= $this->Html->link(
                    'Admin',
                    ['controller' => 'users', 'action' => 'home', '_full' => true]
                    );?></li>
                <li><?= $this->Html->link(
                    'Student',
                    ['controller' => 'student', 'action' => 'dashboard', '_full' => true]
                    );?></li>
                <li><?= $this->Html->link(
                    'Teacher',
                    ['controller' => 'teacher', 'action' => 'home', '_full' => true]
                    );?></li>

                <li style="text-align: center; line-height: 36px; margin-left:50px;">
                   <li style="text-align: center; line-height: 36px; margin-left:50px;">

                                                                        <div class="dropdown" >
                                                                          <li class="btn btn- dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                            <a>Bonjour <?php echo $this->request->getSession()->read('Auth.User.first_name');?></a>

                                                                            </li>
                                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">



                                                                            <div>
                                                                            <?= $this->Html->link('<i class="fa fa-user icon"></i> Profile',
                                                                                                 ['controller' => 'users', 'action' => 'profile', $this->request->getSession()->read('Auth.User.id')],
                                                                                                 ['class' => 'dropdown-item', 'escape' => false]

                                                                                                );?>
                                                                                                </div>

                                                                           <div>
                                                                           <?= $this->Html->link(
                                                                                               '<i class="fa fa-power-off icon"></i> Logout',
                                                                                               ['controller' => 'users', 'action' => 'logout'],
                                                                                               ['class' => 'dropdown-item', 'escape' => false]
                                                                                                );?>


                                                                                                </div>


                                                                          </div>
                                                                        </div>
                                                                        </div>
                                                                        </li>

                                                        
                <?php }?>
                <?php if ($this->request->getSession()->read('Auth.User.role') == 'teacher' ) { ?>
                <li><?= $this->Html->link(
                    'Teacher',
                    ['controller' => 'teacher', 'action' => 'home', '_full' => true]
                    );?></li>
                <li><?= $this->Html->link(
                    'Student',
                    ['controller' => 'student', 'action' => 'dashboard', '_full' => true]
                    );?></li>

                <li style="text-align: center; line-height: 36px; margin-left:50px;">

                                                        <div class="dropdown" >
                                                          <li class="btn btn- dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <a>Bonjour <?php echo $this->request->getSession()->read('Auth.User.first_name');?></a>

                                                            </li>
                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">



                                                            <div>
                                                            <?= $this->Html->link('<i class="fa fa-user icon"></i> Profile',
                                                                                 ['controller' => 'teacher', 'action' => 'profile', $this->request->getSession()->read('Auth.User.id')],
                                                                                 ['class' => 'dropdown-item', 'escape' => false]

                                                                                );?>
                                                                                </div>

                                                           <div>
                                                           <?= $this->Html->link(
                                                                               '<i class="fa fa-power-off icon"></i> Logout',
                                                                               ['controller' => 'users', 'action' => 'logout'],
                                                                               ['class' => 'dropdown-item', 'escape' => false]
                                                                                );?>


                                                                                </div>


                                                          </div>
                                                        </div>
                                                        </div>
                                                        </li>

                <?php }?>
                <?php if ($this->request->getSession()->read('Auth.User.role') == 'unverified' ) { ?>
<li><?= $this->Html->link(
    'Teacher',
    ['controller' => 'teacher', 'action' => 'home', '_full' => true]
    );?></li>
<li><?= $this->Html->link(
    'Student',
    ['controller' => 'student', 'action' => 'dashboard', '_full' => true]
    );?></li>

                <li style="text-align: center; line-height: 36px; margin-left:50px;">

                                                        <div class="dropdown" >
                                                          <li class="btn btn- dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <a>Bonjour <?php echo $this->request->getSession()->read('Auth.User.first_name');?></a>
                                                            </li>

                                                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                                                            <div><?= $this->Html->link(
                                                                                '<i class="fa fa-user icon"></i> Profile',
                                                                                ['controller' => 'teacher', 'action' => 'profile', $this->request->getSession()->read('Auth.User.id')],
                                                                                ['class' => 'dropdown-item', 'escape' => false]
                                                                                );?>
                                                            </div>
                                                             <div>
                                                            <?= $this->Html->link(
                                                                               '<i class="fa fa-power-off icon"></i> Logout',
                                                                               ['controller' => 'users', 'action' => 'logout'],
                                                                               ['class' => 'dropdown-item', 'escape' => false]
                                                                                );?>
                                                             </div>



                                                          </div>
                                                        </div>
                                                        </div>
                                                        </li>

                <?php }?>
                <?php if ($this->request->getSession()->read('Auth.User.role') == 'student' ) { ?>

                <li style="text-align: center; line-height: 36px; margin-left:50px;">

                                        <div class="dropdown" >
                                          <li class="btn btn- dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <a>Bonjour <?php echo $this->request->getSession()->read('Auth.User.first_name');?></a>
                                            </li>

                                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                                             <div><?= $this->Html->link(
                                                                        '<i class="fa fa-user icon"></i> Profile',
                                                                        ['controller' => 'student', 'action' => 'profile', $this->request->getSession()->read('Auth.User.id')],
                                                                        ['class' => 'dropdown-item', 'escape' => false]
                                                                        );?></div>
                                            <div>
                                            <?= $this->Html->link(
                                                               '<i class="fa fa-power-off icon"></i> Logout',
                                                               ['controller' => 'users', 'action' => 'logout'],
                                                               ['class' => 'dropdown-item', 'escape' => false]
                                                                );?>
                                                                </div>



                                          </div>
                                        </div>
                                        </div>
                                        </li>

            </ul>
                <?php }?>
                <?php endif; ?>

        </div>
    </div>
</div>
