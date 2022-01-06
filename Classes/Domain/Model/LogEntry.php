<?php

declare(strict_types=1);

namespace Nerdost\SimpleLog404\Domain\Model;


/**
 * This file is part of the "404 Logging" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2022 Paul Beck <p.beck@nerdost.net>, Nerdost GmbH
 */

/**
 * LogEntry
 */
class LogEntry extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * requesturl
     *
     * @var string
     */
    protected $requesturl = '';

    /**
     * statuscode
     *
     * @var int
     */
    protected $statuscode = 0;

    /**
     * message
     *
     * @var string
     */
    protected $message = '';

    /**
     * hitcount
     *
     * @var string
     */
    protected $hitcount = '';

    /**
     * @var int
     */
    protected $lasthit = 0;

    /**
     * Returns the requesturl
     *
     * @return string $requesturl
     */
    public function getRequesturl()
    {
        return $this->requesturl;
    }

    /**
     * Sets the requesturl
     *
     * @param string $requesturl
     * @return void
     */
    public function setRequesturl(string $requesturl)
    {
        $this->requesturl = $requesturl;
    }

    /**
     * Returns the statuscode
     *
     * @return int $statuscode
     */
    public function getStatuscode()
    {
        return $this->statuscode;
    }

    /**
     * Sets the statuscode
     *
     * @param int $statuscode
     * @return void
     */
    public function setStatuscode(int $statuscode)
    {
        $this->statuscode = $statuscode;
    }

    /**
     * Returns the message
     *
     * @return string $message
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Sets the message
     *
     * @param string $message
     * @return void
     */
    public function setMessage(string $message)
    {
        $this->message = $message;
    }

    /**
     * Returns the hitcount
     *
     * @return string $hitcount
     */
    public function getHitcount()
    {
        return $this->hitcount;
    }

    /**
     * Sets the hitcount
     *
     * @param string $hitcount
     * @return void
     */
    public function setHitcount(string $hitcount)
    {
        $this->hitcount = $hitcount;
    }

    /**
     * @return int
     */
    public function getLasthit(): int
    {
        return $this->lasthit;
    }

    /**
     * @param int $lasthit
     */
    public function setLasthit(int $lasthit): void
    {
        $this->lasthit = $lasthit;
    }
}
