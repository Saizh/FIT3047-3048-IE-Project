<?php
/**
 * @var \App\Model\Entity\User $user
 */
?>

<div class="back-btn"><a><?= $this->Html->link(__('Back'), ['controller' => 'Teacher', 'action' => 'purchasesub']) ?></a></div>
<div class="limiter">
    <!--<div class="container-login100">-->
    <div class="wrap-login1000 p-l-55 p-r-55 p-t-10 p-b-54">
        <div class="users-form">
            <a class="login100-form-title p-b-49"><br>Subscription Purchase</a>
            <div class="desc-message">Email: <?=($user->email)?></div>
            <div class="desc-message">Name: <?=($user->first_name)?> <?=($user->surname)?></div>
            <div class="desc-message">Subscription status: <?=($user->subscription)?></div>
            <div class="wrong-message"><?= $this->Flash->render() ?></div>


            <?= $this->Form->create($user, ['id' => 'purchase']) ?>
            <?= $this->Form->end();?>
            <?php if (($user->subscription) == 'trial' ) { ?>
            <div class="wrong-message">Buy a full subscription for the selected student for $66.00 through the paypal checkout link below  </div>
             <div class="wrong-message">By clicking the check out button below, you agree to  <p><?= $this->Html->link('Terms and Conditions', '/files/TermsandConditions.pdf', ['download' => 'Terms']);?>
                                                                                                                                               and <?= $this->Html->link('Privacy Policy', '/files/PrivacyPolicy.pdf', ['download' => 'Privacy']);?> </div>
            <div id="paypal-button"></div>
            <?php }?>
            <?php if (($user->subscription) == 'full' ) { ?>

            <div class="desc-message">This student have a full subscription</div>
            <?php }?>









        </div>
        <!--</div>-->
    </div>

    <!--</div>-->
</div>

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
