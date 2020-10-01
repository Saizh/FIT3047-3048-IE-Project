<html>
<head>
    <div>
         <title>The Current Terms and Conditions</title>
    </div>

</head>
<body>
    <div class="container">
        <div ><button type="button" class="btn btn-link ">
        <?= $this->Html->link(
                                            'Edit Terms and Conditions',
                                            ['controller' => 'users', 'action' => 'editterms', '_full' => true]
                                            );?>
        </button></div>
        <h2 class="text-center" style="margin-top: 5px; padding-top: 0;">
        The Current Terms and Conditions
        </h2>
        <hr>




        <div >
            <div class="col-md-12">

                <div>


                         <div class="col-md-10">

                        <p>
                         <?php

                         $dbConn=mysqli_connect('130.194.7.82','team112_114','FUBJvTJ6','team112_114_dev');

                         $sql = mysqli_query($dbConn,"select content from terms where id=1");
                         $row = mysqli_fetch_array($sql, MYSQLI_NUM);


                                  echo $row[0];
                                    ?></p>


                    </div>

                </div>

            </div>


        </div>

    </div>
</body>

</html>





