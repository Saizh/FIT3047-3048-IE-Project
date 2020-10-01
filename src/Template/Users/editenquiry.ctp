<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Enquiry $enquiry
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">

</nav>
<div class="enquiry form large-9 medium-8 columns content">
<div class="wrong-message"><?= $this->Flash->render() ?></div>
<div class="users-form">
    <?= $this->Form->create($enquiry) ?>
    <fieldset>
        <legend><?= __('Edit Enquiry') ?></legend>
       <div class="wrap-input100 m-b-23">
                   <?= $this->Form->control('status', [
                   'options' => ['' => '', 'closed' => 'Closed']
                   ]) ?>
               </div>
    </fieldset>
       <?= $this->Form->button(__('Save'), ['class' => 'login100-form-btn']); ?>
    <?= $this->Form->end() ?>
</div>
