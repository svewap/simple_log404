<?php

$EM_CONF[$_EXTKEY] = [
    'title' => '404 Logging',
    'description' => 'Creates a log overview of 404 errors that have been handled by the standard PageErrorHandler but have not been logged anywhere yet.',
    'category' => 'plugin',
    'author' => 'Paul Beck',
    'author_email' => 'p.beck@nerdost.net',
    'state' => 'beta',
    'clearCacheOnLoad' => 1,
    'version' => '1.0.0',
    'constraints' => [
        'depends' => [
            'typo3' => '9.5.0-10.4.99',
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
];
