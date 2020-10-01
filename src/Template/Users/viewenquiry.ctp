<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>



<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">



<!-- <div class="back-btn"><a><?= $this->Html->link(__('Back'), ['controller' => 'Users', 'action' => 'enquirymgmt']) ?></a></div> -->

<li><?= $this->Html->link(__('Back'), ['action' => 'enquirymgmt'], ['class' => 'pull-right btn btn-oval btn-primary']) ?></li>

<br>


    </ul>
</nav>
<div class="users view large-9 medium-8 columns content">

    <table class="view-table">

<div class="users-form">
<div class="wrap-input100 m-b-23">
    <label>Email</label>
    <br>
    <a><?= h($enquiry->email) ?></a>
</div>
<div class="wrap-input100 m-b-23">
    <label>Name</label>
    <br>
    <a><?= h($enquiry->name) ?></a>
</div>
<div class="wrap-input100 m-b-23">
    <label>Phone Number</label>
    <br>
    <a><?= h($enquiry->country_code) ?></a>
    <a><?= h($enquiry->phone_number) ?></a>
</div>
<div class="wrap-input100 m-b-23">
    <label>Message</label>
    <br>
    <textarea disabled><?= h($enquiry->message) ?></textarea>
</div>