


    <!--<div class="container-login100">-->
    <div class="wrong-message"><?= $this->Flash->render() ?></div>
    <div class="container">

    		            <div class="row">
        <div class="wrap-login1000 p-l-55 p-r-55 p-t-10 p-b-54">
<div class="col-md-9">
		    <div class="card">
		        <div class="card-body">
		            <div class="row">
                <a class="login100-form-title p-b-49"><br>Register Account</a>


                <form method="POST" action="add">



                <?= $this->Form->create() ?>
                <div class="wrap-input100 m-b-23">

                                 <label for="first_name"><h4>First name</h4></label>
                                <input type="text" class="form-control" name="first_name" id="first_name" placeholder="first name" title="enter your first name if any.">
                </div>

                                <div class="wrap-input100 m-b-23">
                                <label for="surname"><h4>Surname</h4></label>
                                <input type="text" class="form-control" name="surname" id="surname" placeholder="surname" title="enter your surname if any.">
                 </div>

                 <div class="wrap-input100 m-b-23 ">


                                        <label for="email"><h4>Email</h4></label>

                                      <input type="email" class="form-control" name="email" id="email" placeholder="School Email" title="enter your email.">




                                     </div>
                <div class="wrap-input100 m-b-23">
                    <?= $this->Form->input('year_level',['required',
                    'options' => ['' => '', 'First Year Standard Level' => 'First Year Standard Level','First Year Higher Level' => 'First Year Higher Level', 'Second Year Standard Level' => 'Second Year Standard Level', 'Second Year Higher Level' => 'Second Year Higher Level']]) ?>
                </div>
                    <div class="wrap-input100 m-b-23">
                        <?= $this->Form->control('class_id', ['options' => $class, 'empty' => true]) ?>

                    </div>
</div>


                <?= $this->Form->button(('Register'), ['class' => 'login100-form-btn']); ?>
                </form>
                <?= $this->Form->end();?>
            </div>
            </div>
            </div>
            </div>
            </div>
</div>

        <!--</div>-->

