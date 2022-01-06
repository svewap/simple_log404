<?php
if (!defined('TYPO3_MODE')) {
    die ('Access denied.');
}

$GLOBALS['TYPO3_CONF_VARS']['SYS']['Objects'][\TYPO3\CMS\Core\Error\PageErrorHandler\PageContentErrorHandler::class] = [
    'className' => \Nerdost\SimpleLog404\Error\PageErrorHandler\PageContentErrorHandler::class,
];