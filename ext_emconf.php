<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'TDD Demo',
    'description' => '',
    'category' => 'plugin',
    'author' => 'Angelo Paolo Obispo',
    'author_email' => 'angelo@deskma.com',
    'state' => 'alpha',
    'internal' => '',
    'uploadfolder' => '0',
    'createDirs' => 'fileadmin/attachments',
    'clearCacheOnLoad' => 0,
    'version' => '1.0.0',
    'constraints' => [
        'depends' => [
            'typo3' => '8.7.0-8.7.99',
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
];
