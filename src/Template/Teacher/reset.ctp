<body>
<?php $this->assign('title', 'Reset Password'); ?>
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
            <div class="users-form">
                <a class="login100-form-title p-b-49">Reset Password</a>
    <?= $this->Form->create($user) ?>
                <div class="wrap-input100 m-b-23">
    <?= $this->Form->input('password', ['required' => true, 'autofocus' => true]); ?>
                </div>
        <p class="helper">Passwords must be at least 8 characters</p>
                <div class="wrap-input100 m-b-23">
    <?= $this->Form->input('confirm_password', ['type' => 'password', 'required' => true]); ?>
                </div>

 	<?= $this->Form->button('Submit', ['class' => 'login100-form-btn']); ?>
    <?= $this->Form->end(); ?>
            </div>
        </div>
    </div>
</div>
</body>