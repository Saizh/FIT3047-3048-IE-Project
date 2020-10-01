<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Class $class
 */
?>

<div class="wrap-login1000 p-l-55 p-r-55 p-t-10 p-b-54">

<ul><?= $this->Html->link(__('Back'), ['action' => 'classmgmt'], ['class' => 'pull-right btn btn-oval btn-primary']) ?></ul>

  <!-- <div class="back-btn"><a><?= $this->Html->link(__('Back'), ['controller' => 'Users', 'action' => 'classmgmt']) ?></a></div> -->
<div class="wrong-message"><?= $this->Flash->render() ?></div>

<div class="users-form">
<div class="class form large-9 medium-8 columns content">
    <?= $this->Form->create($class) ?>
    <fieldset>

       <a class="login100-form-title p-b-49">Create Classes</a>
        <div class="wrap-input100 m-b-23">
                      <?= $this->Form->control('class_name',['required']) ?>
</div>
  <div class="wrap-input100 m-b-23">
  <label for="Teacher_1_Name" class="col-sm-2 -form-label">Teacher 1 Name
  </label>
  <select name ="teacher_id" class="form-control" required="true">
  <option value>
 <?php foreach ($user as $users) { ?>

 <option value="<?php echo $users->id?>">
 <?php echo $users->first_name.' '. $users->surname;?>
 </option>
 <?php }?>
 </select>
 </div>
 <div class="wrap-input100 m-b-23">
  <label for="Teacher_2_Name" class="col-sm-2 -form-label">Teacher 2 Name
  </label>
  <select name ="teacher2_id" class="form-control" empty="true">
  <option value>
 <?php foreach ($user as $users) { ?>

 <option value="<?php echo $users->id?>">
 <?php echo $users->first_name.' '. $users->surname;?>
 </option>
 <?php }?>
 </select>
    </fieldset>
   <?= $this->Form->button(__('Save'), ['class' => 'login100-form-btn']); ?>
    <?= $this->Form->end() ?>
</div>

</div>
</div>
</div>
</div>
</div>