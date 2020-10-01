<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Class[]|\Cake\Collection\CollectionInterface $class
 */
?>


<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">

        <li><?= $this->Html->link(__('New Class'), ['action' => 'addclass'], ['class' => 'pull-right btn btn btn-secondary']) ?></li>
    </ul>


</nav>
<br>
<div class="class index large-9 medium-8 columns content">

    <?= $this->Flash->render() ?>
    <table class="myTable cellpadding="0" cellspacing="0"">
        <thead>
            <tr>
            <th scope="col" class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="First Name: activate to sort column descending" style="width: 120px;"><a>Class Id</a></th>
                                <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Surname: activate to sort column ascending" style="width: 178px;"><a>Class Name</a></th>
             <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Surname: activate to sort column ascending" style="width: 188px;"><a>Teacher 1 Name</a></th>
 <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Surname: activate to sort column ascending" style="width: 188px;"><a>Teacher 2 Name</a></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($class as $class): ?>
            <tr>
            <td><?= $this->Number->format($class->class_id) ?></td>
                <td><?= h($class->class_name) ?></td>
                 <?php foreach ($user as $users): { ?>
                                               <?php if ($class->teacher_id == $users->id){?>
                                               <td>  <?= h($users->first_name.' '.$users->surname)?></td>

                                               <?php } ?>
                                               <?php }endforeach; ?>
                <?php foreach ($user as $users): { ?>
                                                               <?php if ($class->teacher2_id == $users->id){?>
                                                               <td>  <?= h($users->first_name.' '.$users->surname)?></td>

                                                               <?php } ?>
                                                               <?php }endforeach; ?>
                                                                    <?php if ($class->teacher2_id == null){?>
                                                                     <td>  </td>
                                                                      <?php } ?>


                <td class="actions">
                     <?= $this->element('edit', ['url' => ['action' => 'editclass', $class->class_id]]) ?>
                     <?= $this->element('delete', ['url' => ['action' => 'deleteclass', $class->class_id]]) ?>


                </td>
            </tr>
            <?php endforeach; ?>


        </tbody>
    </table>
</div>
