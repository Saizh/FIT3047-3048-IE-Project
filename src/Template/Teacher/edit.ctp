<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>



<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">

        <!--<li><?= $this->Form->postLink( __('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?></li>-->


    </ul>
</nav>
<ul><?= $this->Html->link(__('Back'), ['action' => 'teacherclassmgmt'], ['class' => 'pull-right btn btn-oval btn-primary']) ?></ul>

<div class="wrap-login1000 p-l-55 p-r-55 p-t-10 p-b-54">
<div class="wrong-message"><?= $this->Flash->render() ?></div>


<div class="users-form">
    <?= $this->Form->create($user) ?>
    <a class="login100-form-title p-b-49">Edit User</a>
 <?php if ( $user['role'] == 'student' && $user['school'] == $this->request->getSession()->read('Auth.User.school')) { ?>
    <div class="wrap-input100 m-b-23">
        <?= $this->Form->control('first_name',['required']) ?>
    </div>
    <div class="wrap-input100 m-b-23">
        <?= $this->Form->control('surname',['required']) ?>
    </div>
    <div class="wrap-input100 m-b-23">
        <?= $this->Form->control('email',['required']) ?>
    </div>
    <div class="wrap-input100 m-b-23">
        <?= $this->Form->input('year_level',['required',
        'options' => ['' => '', 'First Year Standard Level' => 'First Year Standard Level','First Year Higher Level' => 'First Year Higher Level', 'Second Year Standard Level' => 'Second Year Standard Level', 'Second Year Higher Level' => 'Second Year Higher Level']]) ?>
    </div>
     <div class="wrap-input100 m-b-23">
         <?= $this->Form->control('class_id', ['options' => $class, 'empty' => true]) ?>

     </div>

            <div class="wrap-input100 m-b-23">
                <?= $this->Form->control('password',['required']) ?>
            </div>


    <?= $this->Form->button(__('Save'), ['class' => 'login100-form-btn']); ?>
    <?= $this->Form->end() ?>
      <?php }?>
</div>
</div>


