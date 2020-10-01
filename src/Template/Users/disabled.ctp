<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
?>


<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <!--<ul class="side-nav">-->
    <!--<li class="heading"><?= __('Actions') ?></li>-->
    <!--<li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?></li>-->
    <!--</ul>-->
</nav>
<div class="users index large-9 medium-8 columns content">

    <?= $this->Html->link(__('List Users'), ['action' => 'admin-mgmt'],['class' => 'btn btn-secondary ml-auto']) ?>
</div>
<br>

    <?= $this->Flash->render() ?>
    <table class="myTable cellpadding="0" cellspacing="0"">
    <thead>
    <tr>
        <th scope="col" class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="First Name: activate to sort column descending" style="width: 21px;"><a>First Name</a></th>
        <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Surname: activate to sort column ascending" style="width: 45px;"><a>Surname</a></th>
        <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending" style="width: 45px;"><a>Email</a></th>
        <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Country: activate to sort column ascending" style="width: 45px;"><a>Country</a></th>
        <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="School: activate to sort column ascending" style="width: 45px;"><a>School</a></th>
        <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Role: activate to sort column ascending" style="width: 40px;"><a>Role</a></th>
        <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Year Level: activate to sort column ascending" style="width: 84px;"><a>Year Level</a></th>

        <!--<th scope="col"><?= $this->Paginator->sort('first_name') ?></th>-->
        <!--<th scope="col"><?= $this->Paginator->sort('surname') ?></th>-->
        <!--<th scope="col"><?= $this->Paginator->sort('email') ?></th>-->
        <!--<th scope="col"><?= $this->Paginator->sort('country') ?></th>-->
        <!--<th scope="col"><?= $this->Paginator->sort('school') ?></th>-->
        <!--<th scope="col"><?= $this->Paginator->sort('role') ?></th>-->
        <!--<th scope="col"><?= $this->Paginator->sort('year_level') ?></th>-->

        <th scope="col" class="actions"><?= __('Actions') ?></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($users as $user): ?>
    <tr>



        <td><?= h($this->Text->truncate($user['first_name'],20)) ?></td>
        <td><?= h($this->Text->truncate($user['surname'],20)) ?></td>
        <td><?= h($this->Text->truncate($user['email'],15)) ?></td>
        <td><?= h($this->Text->truncate($user['country'],20)) ?></td>
        <td><?= h($this->Text->truncate($user['school'],10)) ?></td>
        <td><?= h($this->Text->truncate($user['role'],20)) ?></td>
        <td><?= h($this->Text->truncate($user['year_level'],20)) ?></td>



        <td class="actions">
            <!--<?= $this->Html->link(__('View'), ['action' => 'view', $user->id]) ?>-->
            <?= $this->element('edit', ['url' => ['action' => 'edit', $user->id]]) ?>
            <?= $this->element('delete', ['url' => ['action' => 'delete', $user->id]]) ?>

        </td>
    </tr>
    <?php endforeach; ?>
    </tbody>
    </table>

</div>
