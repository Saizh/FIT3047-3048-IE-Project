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
    <h1><?= __('Purchase Subscription for Student') ?></h1>
    <?= $this->Flash->render() ?>
    <table class="myTable cellpadding="0" cellspacing="0"">
        <thead>
            <tr>
                <th scope="col" class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="First Name: activate to sort column descending" style="width: 76px;"><a>First Name</a></th>
                <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Surname: activate to sort column ascending" style="width: 76px;"><a>Surname</a></th>
                <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending" style="width: 71px;"><a>Email</a></th>
                 <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending" style="width: 71px;"><a>Class ID</a></th>
                <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Year Level: activate to sort column ascending" style="width: 75px;"><a>Year Level</a></th>
                <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Subscription: activate to sort column ascending" style="width: 75px;"><a>Subscription</a></th>


                <!--<th scope="col"><?= $this->Paginator->sort('first_name') ?></th>-->
                <!--<th scope="col"><?= $this->Paginator->sort('surname') ?></th>-->
                <!--<th scope="col"><?= $this->Paginator->sort('email') ?></th>-->
                <!--<th scope="col"><?= $this->Paginator->sort('year_level') ?></th>-->
                <!--<th scope="col"><?= $this->Paginator->sort('subscription') ?></th>-->

                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
            <tr>



                 <td><?= h($this->Text->truncate($user['first_name'],20)) ?></td>
                  <td><?= h($this->Text->truncate($user['surname'],20)) ?></td>
                   <td><?= h($this->Text->truncate($user['email'],10)) ?></td>
                   <td><?= h($this->Text->truncate($user['class_id'],20)) ?></td>
                     <td><?= h($this->Text->truncate($user['year_level'],20)) ?></td>
                <td><?= h($this->Text->truncate($user['subscription'],20)) ?></td>



                <td class="actions">
                    <!--<?= $this->Html->link(__('View'), ['action' => 'view', $user->id]) ?>-->

                    <?= $this->element('purchase', ['url' => ['action' => 'purchase', $user->id]]) ?>


                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">

            <!--<?= $this->Paginator->prev('< ' . __('previous')) ?>-->

            <!--<?= $this->Paginator->next(__('next') . ' >') ?>-->
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>

</div>