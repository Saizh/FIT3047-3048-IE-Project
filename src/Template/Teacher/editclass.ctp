<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Class $class
 */
?>

<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">



    </ul>
</nav>
<div class="wrap-login1000 p-l-55 p-r-55 p-t-10 p-b-54">

<ul><?= $this->Html->link(__('Back'), ['action' => 'teacherclassmgmt'], ['class' => 'pull-right btn btn-oval btn-primary']) ?></ul>

<!--	    <div class="back-btn"><a><?= $this->Html->link(__('Back'), ['controller' => 'Teacher', 'action' => 'teacherclassmgmt']) ?></a></div> -->
<br>
    <div class="related"> <h3><?= __('Enroll this class to units') ?></h3></div>
 <?= $this->element('chooseunits', ['url' => ['action' => 'chooseunits', $class->class_id]]) ?>
    <div class="wrong-message"><?= $this->Flash->render() ?></div>
    <div class="users-form">
        <div class="class form large-9 medium-8 columns content">
            <?= $this->Form->create($class) ?>
            <fieldset>
                <a class="login100-form-title p-b-49">Edit the Class</a>
                 <?php if ($class['belongs_to'] == $this->request->getSession()->read('Auth.User.school')) { ?>
                <div class="wrap-input100 m-b-23">
                    <?= $this->Form->control('class_name',['required']) ?>
                </div>
                <div class="wrap-input100 m-b-23">
                    <label for="Teacher_Name" class="col-sm-2 -form-label">Teacher 1 Name
                    </label>
                     <select name ="teacher_id" class="form-control" required="true">
                     <option>
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
            <div class="related">


                <?php if (!empty($class->users)): ?>
                <table class="myTable cellpadding="0" cellspacing="0">
                <h3><?= __('Enrolled Students') ?></h3>
                <thead>
                <tr>
                    <th scope="col"><?= __('Class_ID') ?></th>
                    <th scope="col" class="actions"><?= __('User_ID') ?>
                    </th><th scope="col" class="actions"><?= __('User_Role') ?></th>

                    <th scope="col" class="actions"><?= __('First_Name') ?></th>
                    <th scope="col" class="actions"><?= __('Family_Name') ?></th>
                    <th scope="col" class="actions"><?= __('Email') ?></th>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($class->users as $users): ?>
                <tr>
                    <td><?= h($users->class_id) ?></td>
                    <td><?= h($users->id) ?></td>
                    <td><?= h($users->role) ?></td>
                    <td><?= h($users->first_name) ?></td>
                    <td><?= h($users->surname) ?></td>
                    <td><?= h($users->email) ?></td>

                    <td class="actions">

                         <?= $this->element('edit', ['controller' => 'Teacher','url' => ['action' => 'edit', $users->id]]) ?>
                         <?= $this->Html->link(__('Exercise Attempts'), ['controller' => 'ExerciseAttempts','action' => 'studentindex',$users->id],['class' => 'btn btn-primary']) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
                </tbody>
                </table>

                <?php endif; ?>
                <div class="related"> <h3><?= __('Enroll students by csv') ?></h3></div>
                <?= $this->element('enrol', ['url' => ['action' => 'import', $class->class_id]]) ?>

                <?php }?>
            </div>

        </div>
