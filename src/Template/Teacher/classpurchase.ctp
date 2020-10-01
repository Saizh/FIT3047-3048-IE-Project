<?php
/**
 * @var \App\Model\Entity\User $user
 * @var \App\Model\Entity\Class $class
 */
 $i=0
?>




<div class="limiter">
    <!--<div class="container-login100">-->
    <div class="wrap-login1000 p-l-55 p-r-55 p-t-10 p-b-54">
        <div class="users-form">
            <a class="login100-form-title-2 p-b-49"><br>Subscription Purchase</a>
            <?php if ($class['belongs_to'] == $this->request->getSession()->read('Auth.User.school')) { ?>
            <div class="wrong-message"><?= $this->Flash->render() ?></div>
            <?= $this->Form->create($class, ['id' => 'purchase']) ?>
            <?php if (($class->subscription) == 'trial' ) { ?>

                <?= $this->Form->end();?>
                <div class="wrong-message">You can buy a full subscription for this class through the paypal checkout link below  </div>
                <div class="wrong-message">By clicking the check out button below, you agree to  <p><?= $this->Html->link('Terms and Conditions', '/files/TermsandConditions.pdf', ['download' => 'Terms']);?>
                        and <?= $this->Html->link('Privacy Policy', '/files/PrivacyPolicy.pdf', ['download' => 'Privacy']);?> </div>

                <div id="paypal-button"></div>

            <div class="related">
                <?php if ($class['belongs_to'] == $this->request->getSession()->read('Auth.User.school')) { ?>
                <table class="myTable cellpadding="0" cellspacing="0">
                <h3><?= __('Enrolled Students') ?></h3>
                <thead>
                <tr>
                    <th scope="col"><?= __('Class_ID') ?></th>
                    <th scope="col" class="actions"><?= __('User_ID') ?>
                    </th><th scope="col" class="actions"><?= __('User_Role') ?></th>

                    <th scope="col" class="actions"><?= __('First_Name') ?></th>
                    <th scope="col" class="actions"><?= __('Family_Name') ?></th>
                    <th scope="col" class="actions"><?= __('Email') ?></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($class->users as $users): ?>
                <?php $i++ ?>
                <tr>
                    <td><?= h($users->class_id) ?></td>
                    <td><?= h($users->id) ?></td>
                    <td><?= h($users->role) ?></td>
                    <td><?= h($users->first_name) ?></td>
                    <td><?= h($users->surname) ?></td>
                    <td><?= h($users->email) ?></td>

                </tr>
                <?php endforeach; ?>
                    <?php }?>
                </tbody>
                </table>
                <?php }?>
            </div>


            <?php }?>
            <?php if ($class['belongs_to'] == $this->request->getSession()->read('Auth.User.school')) { ?>
            <?php if (($class->subscription) == 'full' ) { ?>
                <div class="wrong-message">This class has a full subscription currently</div>
            <?php }?>
            <?php }?>

        </div>
        <!--</div>-->
    </div>

    <!--</div>-->
</div>

<script src="https://www.paypalobjects.com/api/checkout.js"></script>
<script>
    var i = "<?php echo $i ?>";
    var price = 66;
    var total = price * i;
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
                        total: total,
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

