<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\School $school
 */
?>

<div class="wrap-login1000 p-l-55 p-r-55 p-t-10 p-b-54">

<ul><?= $this->Html->link(__('Back'), ['action' => 'schoolindex'], ['class' => 'pull-right btn btn-oval btn-primary']) ?></ul>

   <!-- <div class="back-btn"><a><?= $this->Html->link(__('Back'), ['controller' => 'Users', 'action' => 'schoolindex']) ?></a></div> -->
    <div class="wrong-message"><?= $this->Flash->render() ?></div>
    <div class="users-form">
        <a class="login100-form-title p-b-49">Edit School</a>
    <?= $this->Form->create($school) ?>
        <div class="wrap-input100 m-b-23">
        <?php echo $this->Form->control('school_name'); ?>
        </div>
    <?= $this->Form->button(__('Submit'), ['class' => 'login100-form-btn']) ?>
    <?= $this->Form->end() ?>
    </div>
</div>
