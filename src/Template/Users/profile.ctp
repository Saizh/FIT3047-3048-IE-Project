

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<body>
<div class="container">
<div class="row">
    <div class="col-md-9">

        <div class="form-group row">


            <div class="col-md-3 ">

            		     <div class="list-group">

                            <center><h6 class="card-header">Admin Profile</h6></center>
                            <button type="button" class="list-group-item"><?= $this->Html->link(

                                                       'Change Password',
                                                 ['controller' => 'users','action' => 'password']
                                                  );?></button>




                        </div>
            		</div>

            <div class="col-md-9">
            <div class="card">
             <div class="card-body">
             <div class="row">
              <div class="col-md-12">
             	<h4>Your Profile</h4>
             	<hr>
             	</div>
             </div>
            <div class="card-block">
                <?php
                         echo $this->Flash->render();

                $this->Form->setTemplates([
                'inputContainer' => '<div class="form-group{{required}}"> {{content}} <span class="help">{{help}}</span></div>',
                'input' => '<input type="{{type}}" name="{{name}}" class="form-control form-control-danger" {{attrs}}/>',
                'inputContainerError' => '<div class="form-group has-danger {{type}}{{required}}">{{content}}{{error}}</div>',
                'error' => '<div class="text-danger">{{content}}</div>'
                ]);

                echo $this->Form->create('$user');
                echo $this->Form->controls(
                [

                'first_name'      => ['value' => $user_session['first_name'], 'required'  => false, 'placeholder' => 'Enter First Name', 'label' => ['class'=> 'form-control-label', 'text' => 'First Name']],

                'surname'     => ['value' => $user_session['surname'], 'required'  => false, 'placeholder' => 'Enter Surname', 'label' => ['class'=> 'form-control-label']],

                'email'   => ['value' => $user_session['email'], 'required'  => false, 'placeholder' => 'Enter Email', 'label' => ['class'=> 'form-control-label']],


                ],
                [ 'legend' => false]
                );
                echo $this->Form->button('<i class="fa fa-pencil"></i> Update Profile',['class' => 'login100-form-btn']);


                echo $this->Form->end();
                ?>
                </div>
</div>
</div>
</div>
</div>
</body>