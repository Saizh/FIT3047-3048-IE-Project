

<div class="welcome"><a>Bonjour <?php echo $this->request->getSession()->read('Auth.User.first_name');?></a></div>
    <?php if ($this->request->getSession()->read('Auth.User')): ?>
    <?php if ($this->request->getSession()->read('Auth.User.role') != 'unverified' ) { ?>
<hr>


 <h3><?= __('All Students From Your School') ?></h3>
    <?= $this->Flash->render() ?>
    <table class="myTable cellpadding="0" cellspacing="0"">
    <style>


        th {
          background-color: lightblue;

        }
        </style>
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
                     <?= $this->element('edit', ['url' => ['action' => 'edit', $user->id]]) ?>



                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">

            <!--<?= $this->Paginator->prev('< ' . __('previous')) ?>-->

            <!--<?= $this->Paginator->next(__('next') . ' >') ?>-->

        </ul>
        <p   style="  background: #f2f3f4;" ><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
    <?php }?>
    <?php if ($this->request->getSession()->read('Auth.User.role') == 'unverified' ) { ?>
    <div class="desc-message">You do not have a full access to teacher tools</div>
    <div class="desc-message">Please go to this <?= $this->Html->link(
        'page',
        ['controller' => 'teacher', 'action' => 'contact', '_full' => true, $this->request->getSession()->read('Auth.User.id')]
        , ['class' => 'blue-text']
        );?> and give us more information.</div>
    <?php }?>
    <?php endif; ?>


   <!DOCTYPE html>
    <html>
      <head>
        <meta charset="utf-8">
        <title>Unit 1 Page Views Weekly</title>
<script src="https://a.alipayobjects.com/jquery/jquery/1.11.1/jquery.js"></script>
<script src="https://gw.alipayobjects.com/as/g/datavis/g2/2.3.13/index.js"></script>
      </head>
      <body>
          <div id="c1"></div>




      </body>
    </html>
