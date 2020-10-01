<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">

        <!--<li><?= $this->Form->postLink( __('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)] ) ?></li>-->
    </ul>
</nav>
<div class="wrap-login1000 p-l-55 p-r-55 p-t-10 p-b-54">
    <div class="back-btn"><a><?= $this->Html->link(__('Back'), ['controller' => 'teacher', 'action' => 'home']) ?></a></div>
    <div class="wrong-message"><?= $this->Flash->render() ?></div>

    <div class="users-form">
        <?= $this->Form->create($user) ?>
        <a class="login100-form-title p-b-49">More Detail</a>
        <div class="desc-message">Please provide more information to verify you are a teacher such as the website or school email and phone</div>
        <div class="wrap-input100 m-b-23">
            <?= $this->Form->control('more_detail', array('type' => 'textarea')) ?>
        </div>

        <?= $this->Form->button(__('Save'), ['class' => 'login100-form-btn']); ?>
        <?= $this->Form->end() ?>
    </div>
</div>