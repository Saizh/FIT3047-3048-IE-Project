<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'Language Tub';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <!--<?= $this->Html->css('base.css') ?>-->
    <?= $this->Html->css('style.css') ?>
    <?= $this->Html->css('style-2.css') ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="generator" content="Mobirise v4.8.1, mobirise.com">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
    <meta name="description" content="">

    <?= $this->Html->css('homepage.css') ?>
    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css('bootstrap-reboot.min1.css') ?>
    <?= $this->Html->css('bootstrap-grid.min1.css') ?>
    <?= $this->Html->css('bootstrap.min1.css') ?>
    <?= $this->Html->css('tether.min.css') ?>
    <?= $this->Html->css('mbr-additional.css') ?>
    <?= $this->Html->css('util.css') ?>


    <?= $this->Html->script('jquery.min.js') ?>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <!--<?= $this->fetch('meta') ?>-->
    <!--<?= $this->fetch('css') ?>-->
    <!--<?= $this->fetch('script') ?>-->
</head>
<body>
    <?= $this->element('navigation') ?>
    <?= $this->Flash->render() ?>
    <div class="container1 clearfix">
        <?= $this->fetch('content') ?>
    </div>



    <footer>
        <?= $this->element('footer') ?>
    </footer>
</body>
</html>
