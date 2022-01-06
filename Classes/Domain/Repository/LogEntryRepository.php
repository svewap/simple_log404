<?php

declare(strict_types=1);

namespace Nerdost\SimpleLog404\Domain\Repository;


/**
 * This file is part of the "404 Logging" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2022 Paul Beck <p.beck@nerdost.net>, Nerdost GmbH
 */

/**
 * The repository for LogEntries
 */
class LogEntryRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{

    protected $defaultOrderings = [
        'hitcount' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_DESCENDING
    ];

}
