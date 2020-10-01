<?php
$cakeDescription = 'Language Tub';
?>
<head>
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>

    </title>
<?php $this->layout = false;?>
<?= $this->Html->css('style-2.css') ?>
    <?= $this->Html->meta('icon') ?>
</head>
<?= $this->element('navigation2') ?>
<div class="row">
         <div class="col-lg-4">
             <?= $this->Html->image('default-user-picture.jpg', ['alt' => ' Default User image','style' => 'height: 18%; width: 10%; display: block;']); ?>
             <br>
             <ul class="list-group">
                 <li class="list-group-item">
                     <span class="tag tag-default tag-pill float-xs-right"><b>Email ID: &nbsp;</b></span>
                        <?= $user_session['email']; ?>
                 </li>
             </ul>
             <br>
         </div>
         <div class="col-lg-9">
             <div class="card">
                 <h3 class="card-header">User Profile</h3>
                 <div class="card-block">
                     <?php
                         echo $this->Flash->render();

                         $this->Form->setTemplates([
                             'inputContainer' => '<div class="form-group{{required}}"> {{content}} <span class="help">{{help}}</span></div>',
                             'input' => '<input type="{{type}}" name="{{name}}" class="form-control form-control-danger" {{attrs}}/>',
                             'inputContainerError' => '<div class="form-group has-danger {{type}}{{required}}">{{content}}{{error}}</div>',
                             'error' => '<div class="text-danger">{{content}}</div>'
                         ]);

                         echo $this->Form->create('Auth.User');
                         echo $this->Form->controls(
                             [
                                 'First name'      => ['value' => $user_session['first_name'], 'required'  => false, 'placeholder' => 'Enter First Name', 'label' => ['class'=> 'form-control-label', 'text' => 'User First Name']],
                                 'Surname'     => ['value' => $user_session['surname'], 'required'  => false, 'placeholder' => 'Enter Surname', 'label' => ['class'=> 'form-control-label','text' => 'User Surname']],
                                 'Email'   => ['value' => $user_session['email'], 'required'  => false, 'placeholder' => 'Enter Email', 'label' => ['class'=> 'form-control-label','text' => 'User Email']],
                                 'Year Level'   => ['value' => $user_session['year_level'], 'required'  => false, 'placeholder' => 'Enter Year Level', 'label' => ['class'=> 'form-control-label','text' => 'User Year Level']],
                                 'Role :'   => ['value' => $user_session['role'], 'required'  => false,'label' => ['class'=> 'form-control-label','text' => 'User Role']],
                             ],
                             [ 'legend' => false]
                         );
                         echo $this->Form->button('<i class="fa fa-pencil"></i> Update Profile',['class' => 'btn btn-success']);
                         echo $this->Form->end();
                     ?>
                 </div>
             </div>
         </div>
     </div>