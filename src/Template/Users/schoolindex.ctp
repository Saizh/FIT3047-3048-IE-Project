<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\School[]|\Cake\Collection\CollectionInterface $school
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">


        <li><?= $this->Html->link(__('New School'), ['action' => 'addschool'], ['class' => 'pull-right btn btn-oval btn btn-secondary']) ?></li>
    </ul>


</nav>
<div class="wrong-message"><?= $this->Flash->render() ?></div>
<div class="school index large-9 medium-8 columns content">
<br>
    <table cellpadding="0" cellspacing="0">

        <thead>


        <tr>
        <style>
            tr:nth-child(even){background-color: #f2f2f2}
            </style>
        <tr>
            <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label=" Enquiry sent in on: activate to sort column ascending" style="width: 400px;"><a>School Name</a></th>
            <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label=" Enquiry sent in on: activate to sort column ascending" style="width: 300px;"><a>Verification Status</a></th>

            <th scope="col" class="actions"><?= __('Actions') ?></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($school as $school): ?>
        <tr>
            <td><?= h($school->school_name) ?></td>
            <td><?= h($school->status) ?></td>
            <td class="actions">
                <?= $this->element('edit', ['url' => ['action' => 'editschool', $school->school_id]]) ?>
                <?= $this->element('delete', ['url' => ['action' => 'deleteschool', $school->school_id]]) ?>
                <?= $this->element('verify', ['url' => ['action' => 'verifiesschool', $school->school_id]]) ?>
            </td>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>

    </div>
</div>
