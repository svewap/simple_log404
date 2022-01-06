<?php

declare(strict_types=1);

namespace Nerdost\SimpleLog404\Controller;


/**
 * This file is part of the "404 Logging" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2022 Paul Beck <p.beck@nerdost.net>, Nerdost GmbH
 */

/**
 * LogEntryController
 */
class LogEntryController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * logEntryRepository
     *
     * @var \Nerdost\SimpleLog404\Domain\Repository\LogEntryRepository
     */
    protected $logEntryRepository = null;

    /**
     * @param \Nerdost\SimpleLog404\Domain\Repository\LogEntryRepository $logEntryRepository
     */
    public function injectLogEntryRepository(\Nerdost\SimpleLog404\Domain\Repository\LogEntryRepository $logEntryRepository)
    {
        $this->logEntryRepository = $logEntryRepository;
    }

    /**
     * action list
     *
     * @return string|object|null|void
     */
    public function listAction()
    {
        $logEntries = $this->logEntryRepository->findAll();
        $this->view->assign('logEntries', $logEntries);
    }
}
