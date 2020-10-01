<div class="container">
    <div >
        <button type="button" class="btn btn-link ">
        <?=
        $this->Html->link(
            'Edit Terms and Conditions',
            [
                'controller' => 'users',
                'action' => 'editterms',
                '_full' => true
            ]
        );
        ?>
        </button>

        <button type="button" class="btn btn-link " >

        <?=
        $this->Html->link(
            'Download Terms and Conditions',
            [
                'controller' => 'users',
                'action' => 'downloadterms',
                '_full' => true

            ]
        );
        ?>

        </button>
    </div>
    <br>

    <h2 class="text-center" style="margin-top: 5px; padding-top: 0;">The Current Terms and Conditions</h2>
    <hr>

    <div >
        <div class="col-md-12">
            <div>
                <div class="col-md-10">
                    <?= $terms['content']; ?>
                </div>
            </div>
        </div>
    </div>

</div>