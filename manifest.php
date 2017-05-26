<?php

$manifest = array(
    'author' => 'Roniel Bernas',
    'description' => 'Installs a sample dashlet',
    'icon' => '',
    'is_uninstallable' => true,
    'name' => 'Example_Dropbox_Dashlet',
    'type' => 'module',
    'version' => '1341607504',

    'built_in_version' => '7.9.0.0',
    'acceptable_sugar_versions' =>
        array(
            'exact_matches' => array(
                '7.9.0.0',
            ),
        ),

    'acceptable_sugar_flavors' =>
        array(
            'PRO',
            'CORP',
            'ENT',
            'ULT',
        ),
    'readme' => '',
    'key' => 'ron',
    'published_date' => '2017-05-26 20:14:13',
);
$installdefs['copy'] = array(
    0 => array(
        'from' => '<basepath>/Files/custom/',
        'to' => 'custom/',
    ),
);