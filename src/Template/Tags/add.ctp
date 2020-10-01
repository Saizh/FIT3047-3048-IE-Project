<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tag $tag
 */
?>
<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist" style="float: none">
    <li class="nav-item">
        <a class="nav-link active" id="pills-atag-tab" data-toggle="pill" href="#pills-atag" role="tab" aria-controls="pills-atag" aria-selected="false">Add/Remove Tags from Exercises</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="pills-ctag-tab" data-toggle="pill" href="#pills-ctag" role="tab" aria-controls="pills-ctag" aria-selected="true">Create a New Tag</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="pills-ddtag-tab" data-toggle="pill" href="#pills-ddtag" role="tab" aria-controls="pills-ddtag" aria-selected="true">Delete Tags</a>
    </li>
</ul>
<div class="tab-content" id="pills-tabContent">
    <div class="tab-pane show active" id="pills-atag" role="tabpanel" aria-labelledby="pills-atag-tab">
       <?php
        echo $this->Form->create($exercisetag);?>
        <fieldset>
            <legend><?= __('Select Tags to add to the Exercise') ?></legend>
            <br>
            <input name="formid" type="hidden" value="1">
            <?php foreach($alltags as $tags){ ?>
            <?php
            $arrlen = count($tagarray);
            $disable = 0;
            for($x = 0; $x < $arrlen; $x++){
                if($tagarray[$x] == $tags['name']){
                    $disable = 1;
                }
            }
            ?>
            <div class= "input checkbox form-control">
                <label for = <?= $tags['name']?>> <input type="checkbox" name=<?= $tags['name']?>  <?php if($disable == 1){?>checked<?php }?>  value=<?= $tags['id']?> style="float: none" id=<?= $tags['name']?>>
                    <?= $tags['name']?>
                </label>
            </div>
        </fieldset>
            <?php
        }?>
         <div class = top2>
            <?= $this->Form->button(__('Submit'),['class' => 'btn btn-default','top']) ?>
         </div>
        <?php
        echo $this->Form->end();
        ?>
    </div>
    <div class="tab-pane" id="pills-ctag" role="tabpanel" aria-labelledby="pills-ctag-tab">
        <div class="tags form large-9 medium-8 columns content">
            <?= $this->Form->create($tag) ?>
            <fieldset>
                <legend><?= __('Add Tag') ?></legend>
                <br>
                <input name="formid" type="hidden" value="2">
                <?php
                    echo $this->Form->control('name', ['class' => 'form-control']);
                ?>
            </fieldset>
            <div class = top2>
                <?= $this->Form->button(__('Submit'),['class' => 'btn btn-default','top']) ?>
            </div>
            <?= $this->Form->end() ?>
        </div>
    </div>
    <div class="tab-pane" id="pills-ddtag" role="tabpanel" aria-labelledby="pills-ddtag-tab">
        <?php
        echo $this->Form->create($exercisetag);?>
        <fieldset>
            <legend><?= __("Select Tags to delete") ?></legend>
            <br>
            <input name="formid" type="hidden" value="4">
            <?php foreach($alltags as $tags){ ?>
            <div class= "input checkbox form-control">
                <label for = <?= $tags['name']?>> <input type="checkbox" name=<?= $tags['name']?>  value=<?= $tags['id']?> style="float: none" id=<?= $tags['name']?>>
                    <?= $tags['name']?>
                </label>
            </div>
        </fieldset>
    <?php
    }?>
        <div class = top2>
            <?= $this->Form->button(__('Submit'),['class' => 'btn btn-default','top']) ?>
        </div>
        <?php
        echo $this->Form->end();
        ?>
    </div>
</div>
<div class="top">
    <?= $this->Html->link(__('List Exercises'), ['controller' => 'Exercises', 'action' => 'index'],['class' => 'btn btn-info']) ?>
    <?= $this->Html->link(__('New Exercise'), ['controller' => 'Exercises', 'action' => 'add'],['class' => 'btn btn-info']) ?>
</div>
