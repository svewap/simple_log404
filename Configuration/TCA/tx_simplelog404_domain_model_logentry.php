<?php
return [
    'ctrl' => [
        'title' => 'LLL:EXT:simple_log404/Resources/Private/Language/locallang_db.xlf:tx_simplelog404_domain_model_logentry',
        'label' => 'requesturl',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'rootLevel' => 1,
        'enablecolumns' => [
        ],
        'searchFields' => 'requesturl,message,hitcount, lasthit',
        'iconfile' => 'EXT:simple_log404/Resources/Public/Icons/tx_simplelog404_domain_model_logentry.gif'
    ],
    'types' => [
        '1' => ['showitem' => 'requesturl, statuscode, message, hitcount, lasthit'],
    ],
    'columns' => [
        'requesturl' => [
            'exclude' => true,
            'label' => 'LLL:EXT:simple_log404/Resources/Private/Language/locallang_db.xlf:tx_simplelog404_domain_model_logentry.requesturl',
            'config' => [
                'type' => 'text',
                'cols' => 40,
                'rows' => 2,
                'eval' => 'trim',
                'default' => ''
            ]
        ],
        'statuscode' => [
            'exclude' => true,
            'label' => 'LLL:EXT:simple_log404/Resources/Private/Language/locallang_db.xlf:tx_simplelog404_domain_model_logentry.statuscode',
            'config' => [
                'readOnly' => true,
                'type' => 'input',
                'size' => 4,
                'eval' => 'int',
                'default' => 0
            ]
        ],
        'message' => [
            'exclude' => true,
            'label' => 'LLL:EXT:simple_log404/Resources/Private/Language/locallang_db.xlf:tx_simplelog404_domain_model_logentry.message',
            'config' => [
                'readOnly' => true,
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
                'default' => ''
            ],
        ],
        'hitcount' => [
            'exclude' => true,
            'label' => 'LLL:EXT:simple_log404/Resources/Private/Language/locallang_db.xlf:tx_simplelog404_domain_model_logentry.hitcount',
            'config' => [
                'readOnly' => true,
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
                'default' => ''
            ],
        ],
        'lasthit' => [
            'exclude' => true,
            'label' => 'Last Hit',
            'config' => [
                'readOnly' => true,
                'type' => 'input',
                'size' => 30,
                'eval' => 'Datetime',
                'default' => time()
            ],
        ],
    ],
];
