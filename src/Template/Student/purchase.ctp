<?php
/**
 * @var \App\Model\Entity\User $user
 */
?>

    <!-- Breadcrumbs-->


<div class="limiter">
    <!--<div class="container-login100">-->
    <div class="wrap-login1000 p-l-55 p-r-55 p-t-10 p-b-54">
        <div class="users-form">
            <a class="login100-form-title-2 p-b-49"><br>Subscription Purchase</a>
            <div class="wrong-message"><?= $this->Flash->render() ?></div>
            <?php if ($this->request->getSession()->read('Auth.User')): ?>
            <?php if ($this->request->getSession()->read('Auth.User.subscription') == 'trial' ) { ?>
            <?= $this->Form->create('purchase', ['id' => 'purchase']) ?>
            <?= $this->Form->end();?>
            <div class="wrong-message">You can buy a full subscription for $66.00 through the paypal checkout link below  </div>
                         <div class="wrong-message">By clicking the check out button below, you agree to  <p><?= $this->Html->link('Terms and Conditions', '/files/TermsandConditions.pdf', ['download' => 'Terms']);?>
                                                                                                                                   and <?= $this->Html->link('Privacy Policy', '/files/PrivacyPolicy.pdf', ['download' => 'Privacy']);?> </div>

            <div id="paypal-button"></div>
            <script src="https://www.paypalobjects.com/api/checkout.js"></script>
            <script>
              paypal.Button.render({
                // Configure environment
                env: 'sandbox',
                client: {
                  sandbox: 'AYZtiLczWIeBHGNhkAcRHdaenQR5nwKIoN6u22o962jpud5KFoxXpmf3NwKYIPweVQ3BxAwWIburdA6w',

                },
                // Customize button (optional)
                locale: 'en_US',
                style: {
                  size: 'medium',
                  color: 'gold',
                  shape: 'pill',
                },

                // Enable Pay Now checkout flow (optional)
                commit: true,

                // Set up a payment
                payment: function(data, actions) {
                  return actions.payment.create({
                    transactions: [{
                      amount: {
                        total: '66.00',
                        currency: 'AUD'
                      }
                    }]
                  });
                },
                // Execute the payment
                onAuthorize: function(data, actions) {
                  return actions.payment.execute().then(function() {
                    // Show a confirmation message to the buyer
                      document.getElementById("purchase").submit();
                    window.alert('Thank you for your purchase!');

                  });
                }
              }, '#paypal-button');

            </script>

            <?php }?>
            <?php if ($this->request->getSession()->read('Auth.User.subscription') == 'full' ) { ?>
            <div class="wrong-message">You have a full subscription</div>
            <div class="wrong-message">Your subscription will be expired on: <?=($this->Time->format($user['expiry'], 'yyyy-MM-dd'))?></div>
            <?php }?>
            <?php endif; ?>
        </div>
        <!--</div>-->
    </div>

    <!--</div>-->
</div>
<div class="copyright">
    <p>Copyright &copy; 2012 Language Tub. All Rights Reserved.  <?=
        $this->Html->link(
        'Terms and Conditions',[ 'controller' => 'users', 'action' => 'downloadterms', '_full' => true ] ); ?>
        and <?= $this->Html->link('Privacy Policy', '/files/PrivacyPolicy.pdf', ['download' => 'Privacy']);?>
    </p>
</div>
