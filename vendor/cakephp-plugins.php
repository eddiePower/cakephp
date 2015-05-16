<?php
$baseDir = dirname(dirname(__FILE__));
return [
    'plugins' => [
        'Bake' => $baseDir . '/vendor/cakephp/bake/',
        'Bootstrap' => $baseDir . '/vendor/elboletaire/twbs-cake-plugin/',
        'Bootstrap3' => $baseDir . '/vendor/holt59/cakephp3-bootstrap3-helpers/',
        'BootstrapUI' => $baseDir . '/vendor/friendsofcake/bootstrap-ui/',
        'DebugKit' => $baseDir . '/vendor/cakephp/debug_kit/',
        'Less' => $baseDir . '/vendor/elboletaire/less-cake-plugin/',
        'Migrations' => $baseDir . '/vendor/cakephp/migrations/',
        'Twit' => $baseDir . '/plugins/Twit/'
    ]
];
