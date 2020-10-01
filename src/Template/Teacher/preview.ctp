


<?= $this->Flash->render() ?>
<div class="container clearFix">
    <?= $this->fetch('content') ?>

</div>

<script>
    function validateForm()
    {
        var x = document.forms["addForm"]["FileToImport"].value;
        if(x == "")
        {
            document.getElementByID("demo").innerHTML="*mandatory";
            return false;
        }
    }
</script>
<a class="login100-form-title p-b-49"><br>Register Student Account</a>
<div class="desc-message">Click <?= $this->Html->link('here ', '/files/Teacher Enrol.csv', ['download' => 'Teacher Enrol.csv']);?> to download the csv file</div>
<div class="desc-message">You can upload a CSV file to register your students</div>
<?php echo $this->Form->create('addForm', ['type'=>'file', 'name'=> 'addForm', 'controller'=>'teacher', 'action' => 'import' , 'onSubmit'=>'return validateForm()']); ?>
Choose a CSV File <span id="demo" style="color:red"></span>
<input type="file" name="FileToImport" id="FileToImport" accept=".csv" required/>


 <style>
          table {
            margin: 0 auto;
            text-align: center;
            border-collapse: collapse;
            border: 1px solid #d4d4d4;
          }

          tr:nth-child(even) {
            background: #d4d4d4;
          }

          th, td {
            padding: 10px 30px;
          }

          th {
            border-bottom: 1px solid #d4d4d4;
          }
        </style>

<button type="submit" value="Up" class="btn-csv" id="load"> Upload </button>