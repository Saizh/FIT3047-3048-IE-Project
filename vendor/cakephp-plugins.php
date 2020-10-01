<?php
$baseDir = dirname(dirname(__FILE__));
return [
    'plugins' => [
        'Bake' => $baseDir . '/vendor/cakephp/bake/',
        'CakeCaptcha' => $baseDir . '/vendor/captcha-com/cakephp-captcha/',
        'CakePdf' => $baseDir . '/vendor/friendsofcake/cakepdf/',
        'CsvView' => $baseDir . '/vendor/friendsofcake/cakephp-csvview/',
        'DebugKit' => $baseDir . '/vendor/cakephp/debug_kit/',
        'Migrations' => $baseDir . '/vendor/cakephp/migrations/',
        'Recaptcha' => $baseDir . '/vendor/crabstudio/recaptcha/',
        'WyriHaximus/TwigView' => $baseDir . '/vendor/wyrihaximus/twig-view/'
    ]
];