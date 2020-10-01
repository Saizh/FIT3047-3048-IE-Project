
<div>

<div class="container clearFix">
    <?= $this->fetch('content') ?>

</div>

<script language="javascript" type="text/javascript">
    function validateForm()
    {
        var x = document.forms["addForm"]["FileToImport"].value;
        if(x == "")
        {
            document.getElementByID("demo").innerHTML="*mandatory";
            return false;
        }
    }

    function promptpopup()
            {
              var x;
               var r=confirm("File Uploaded!");
               if (r==true)
                x="";
                document.getElementById("demo").innerHTML=x;
            }
</script>



<a class="login100-form-title p-b-25"><br>Register Student Account</a>
<div class="desc-message">Click
<?= $this->Html->link('here ', '/files/Admin Enrol.csv', ['download' => 'Admin Enrol.csv']);?> to download the csv file</div>
<div class="desc-message">Click <?= $this->Html->link('here ', '/files/InstructionForAdmin.pdf', ['download' => 'InstructionForAdmin.pdf']);?> to view the instruction for filling the csv file</div>
<div class="desc-message">You can upload a CSV file to register your students</div>
<?php echo $this->Form->create('addForm', ['type'=>'file', 'name'=> 'addForm', 'controller'=>'teacher','action' => 'import' ,
 'onSubmit'=>'return validateForm()']); ?>
<div class="desc-message">Choose a CSV File <span id="demo" style="color:red"></span></div>
<input type="file" name="FileToImport" id="FileToImport" accept=".csv" onchange="textMess(this.files)" required/>


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


        <button type="submit" value="Upload" class="btn-csv" id="load" onclick="promptpopup()"> Upload </button>
    <div class="desc-message"><?= $this->Flash->render() ?></div>

<br>
<br>

        <div>
          <title>CSV Viewer Online</title>
          <link rel="stylesheet" href="./styles.css">
        </div>

        <div>
          <p align="center">

          </p>
          <div id="handsontable-container"></div>

          <script src="https://cdn.jsdelivr.net/handsontable/0.28.4/handsontable.full.min.js"></script>
          <script src="https://cdn.jsdelivr.net/papaparse/4.1.2/papaparse.min.js"></script>

          <script>

        var input = document.getElementById('FileToImport')
        var handsontableContainer = document.getElementById('handsontable-container')

        input.onchange = function () {
          var file = this.files[0]
          var reader = new FileReader()

          reader.onload = function (e) {
            var csv = e.target.result
            var data = Papa.parse(csv, {
              header: true,
              skipEmptyLines: true
            })

            // reset container
            handsontableContainer.innerHTML = ''
            handsontableContainer.className = ''

            Handsontable(handsontableContainer, {
              data: data.data,
              rowHeaders: true,
              colHeaders: data.meta.fields,
              columnSorting: true
            })
          }

          reader.readAsText(file)
        }
          </script>

          <link rel="stylesheet" href="https://cdn.jsdelivr.net/handsontable/0.28.4/handsontable.full.min.css">
        </div>


         <div>
                <?php

                if ($this->request->is('post')) {
                 $fileName = $_FILES['FileToImport']['tmp_name'];



                echo "<html><body><table>\n\n";
                $f = fopen($fileName, "r");
                while (($line = fgetcsv($f)) !== false) {
                        echo "<tr>";
                        foreach ($line as $cell) {
                                echo "<td>" . htmlspecialchars($cell) . "</td>";
                        }
                        echo "</tr>\n";
                }
                fclose($f);
                echo "\n</table></body></html>";
                }
                ?>
                </div>

                </div>

    <div class="top">
        <?= $this->Html->link(__('List Users'), ['action' => 'admin-mgmt'],['class' => 'btn btn-secondary ml-auto']) ?>
    </div>
