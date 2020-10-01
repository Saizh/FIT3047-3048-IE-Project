
<body>
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
            <div class="users-form">
                <a class="login100-form-title p-b-49">Login</a>
                    <div class="wrong-message"><?= $this->Flash->render() ?></div>
                <?= $this->Form->create() ?>

                <div class="wrap-input100 m-b-23">
                    <?= $this->Form->control('email',['placeholder' => 'Your email address']) ?>
                </div>
                <div class="wrap-input100">
                    <?= $this->Form->control('password',['placeholder' => 'Your password']) ?>
                </div>


                <div class="text-right p-t-8">
                    <?= $this->Html->link("Forgot password?", ['action' => 'password']); ?>
                </div>

                <!--<?= $this->Form->control('remember', ['type' => "checkbox", 'label' => "Remember Me", 'hiddenField' => false]); ?>-->

                <div class="wrong-message"><?= $this->Flash->render() ?></div>


                        <?= $this->Form->button(__('Login'), ['class' => 'login100-form-btn']); ?>
                            <div class="text-center p-t-8 p-b-31">
                                <?= $this->Html->link("New to Language Tub? Sign Up!", ['action' => 'register']); ?>
                            </div>
                    </div>



            <?= $this->Form->end() ?>
</div>
        </div>
    </div>
    </div>
</body>
</html>