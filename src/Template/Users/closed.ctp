<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Enquiry[]|\Cake\Collection\CollectionInterface $enquiry
 */
?>

<nav class="large-3 medium-4 columns" id="actions-sidebar">

</nav>
<div class="enquiry index large-9 medium-8 columns content">

    <?= $this->Flash->render() ?>
     <table class="myTable cellpadding="0" cellspacing="0"">
        <thead>
            <tr>
                <th scope="col" class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 121px;"><a>Name</a></th>
                <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending" style="width: 145px;"><a>Email</a></th>
                <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Phone Number: activate to sort column ascending" style="width: 145px;"><a>Phone Number</a></th>
                <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Message: activate to sort column ascending" style="width: 145px;"><a>Message</a></th>
                 <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label=" Enquiry sent in on: activate to sort column ascending" style="width: 145px;"><a> Enquiry sent in on</a></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>


        <tbody>
            <?php foreach ($enquiry as $enquiry): ?>
            <tr>
                <td><?= h($enquiry->name) ?></td>
                <td><?= h($this->Text->truncate($enquiry['email'],25)) ?></td>
               <td><?= h($this->Text->truncate($enquiry['phone_number'],30)) ?></td>
                <td><?= h($this->Text->truncate($enquiry['message'],30)) ?></td>
               <td><?= h($this->Time->format($enquiry['created'], 'yyyy-MM-dd HH:mm:ss')) ?></td>


                <td class="actions">
                    <?= $this->element('view', ['url' => ['action' => 'viewenquiry', $enquiry->id]]) ?>
                    <?= $this->element('delete', ['url' => ['action' => 'deleteenquiry', $enquiry->id]]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<div class="top">
    <?= $this->Html->link(__('View Enquiries'), ['action' => 'enquirymgmt'],['class' => 'btn btn-info ml-auto']) ?>
</div>