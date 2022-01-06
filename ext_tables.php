<?php
defined('TYPO3_MODE') || die();

(static function() {
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerModule(
        'SimpleLog404',
        'site',
        'main',
        '',
        [
            \Nerdost\SimpleLog404\Controller\LogEntryController::class => 'list',
        ],
        [
            'access' => 'user,group',
            'icon'   => 'EXT:simple_log404/Resources/Public/Icons/user_mod_main.svg',
            'labels' => 'LLL:EXT:simple_log404/Resources/Private/Language/locallang_main.xlf',
            'navigationComponentId' => '',
            'inheritNavigationComponentFromMainModule' => false
        ]
    );

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_simplelog404_domain_model_logentry', 'EXT:simple_log404/Resources/Private/Language/locallang_csh_tx_simplelog404_domain_model_logentry.xlf');
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_simplelog404_domain_model_logentry');
})();
