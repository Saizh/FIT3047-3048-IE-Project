

<div class="welcome"><left><a>Welcome <?php echo $this->request->getSession()->read('Auth.User.first_name');?></a></div>


<div class="limiter">
    <!--<div class="container-login100">-->
    <div class="wrap-login1000 p-l-55 p-r-55 p-t-10 p-b-54">
        <div class="users-form">
            <a class="login100-form-title p-b-49"><br>Subscription Status</a>
            <div class="wrong-message"><?= $this->Flash->render() ?></div>
            <?php if ($this->request->getSession()->read('Auth.User')): ?>
            <?php if ($this->request->getSession()->read('Auth.User.subscription') == 'trial' ) { ?>
            <?= $this->Form->create('purchase', ['id' => 'purchase']) ?>
            <?= $this->Form->end();?>
            <div class="wrong-message">You are now in a Trial Subscription</div>
            <div class="wrong-message">You can buy a full subscription for $66.00 through the paypal checkout button in "My Subscription"->"Purchase"  </div>


            <?php }?>
            <?php if ($this->request->getSession()->read('Auth.User.subscription') == 'full' ) { ?>
            <div class="desc-message">You have a full subscription</div>
            <?php }?>
            <?php endif; ?>
        </div>
        <!--</div>-->
    </div>

    <!--</div>-->
</div>