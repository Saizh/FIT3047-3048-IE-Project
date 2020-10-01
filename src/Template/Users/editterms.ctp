
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">


    <p>
    <h2 class="text-center" style="margin-top: 5px; padding-top: 0;">Edit the Current Terms and Conditions</h2>
    <hr>

    <div class="wrong-message"><?= $this->Flash->render(); ?></div>

    <?= $this->Form->create() ?>
        <!-- <div contenteditable="true" id="editable"></div> -->
        <?= $this->Form->input('content', array('type' => 'textarea', 'label' => false, 'cols' => 80, 'rows' => 80, 'id' =>'editor1', 'value' => $terms['content'])); ?>
        <?= $this->Form->button('Update', ['type' => 'submit', 'class' => 'btn btn-success btn-block', 'id' => 'update']); ?>
    <?= $this->Form->end() ?>


    <script type="text/javascript" src="../ckeditor/ckeditor.js"></script>

    <script type="text/javascript">
        function CKupdate() {
            for (editor1 in CKEDITOR.instances)
                CKEDITOR.instances[editor1].updateElement();
        }
    </script>
    <script type="text/javascript">
        CKEDITOR.replace( 'editor1' );
        var editor = CKEDITOR.replace('editor1');
        CKFinder.setupCKEditor(editor, './ckfinder/');
    </script>

<script type="text/javascript">
    $("div[editor1='true']").each(function(index) {
        var content = $(this).attr('content');
        var id = $(this).attr('id');
        var oldData = null;
        CKEDITOR.inline(content, {
            on: {
                instanceReady: function(event) {
                    //get current data and save in variable
                    oldData = event.editor.getData();
                    // overwrite the default save function
                    event.editor.addCommand("save", {
                        modes: {
                            wysiwyg: 1,
                            source: 1
                        },
                        exec: function() {
                            var data = event.editor.getData();
                            //check if any changes has been carried out
                            if (oldData !== data) {
                                oldData = data;
                                $.ajax({
                                        type: 'POST',
                                        url: 'process.php',
                                        data: {
                                            content: data,
                                            content: content,
                                            id: id
                                        }
                                    })
                                    .done(function(data) {
                                        alert('saved');
                                    })
                                    .fail(function() {
                                        alert('something went wrong');
                                    });
                            } else
                                alert('looks like nothing has been changed');
                        }
                    });
                }
            }
        });
    });
</script>
