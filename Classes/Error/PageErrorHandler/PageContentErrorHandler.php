<?php

namespace Nerdost\SimpleLog404\Error\PageErrorHandler;

use Doctrine\DBAL\DBALException;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Database\Query\QueryBuilder;
use TYPO3\CMS\Core\Http\NormalizedParams;
use TYPO3\CMS\Core\Utility\GeneralUtility;

class PageContentErrorHandler extends \TYPO3\CMS\Core\Error\PageErrorHandler\PageContentErrorHandler
{

    /**
     * @param ServerRequestInterface $request
     * @param string $message
     * @param array $reasons
     * @return ResponseInterface
     * @throws DBALException
     */
    public function handlePageError(ServerRequestInterface $request, string $message, array $reasons = []): ResponseInterface
    {
        /** @var NormalizedParams $params */
        $params = $request->getAttributes()['normalizedParams'];
        $requestUri = $params->getRequestUrl();

        $qb = $this->getQueryBuilder();
        $logEntry = $qb->select('*')->from('tx_simplelog404_domain_model_logentry')
            ->where(
                $qb->expr()->eq('requesturl', $qb->createNamedParameter($requestUri))
            )->execute()->fetch();

        $qb = $this->getQueryBuilder();

        if (false === $logEntry) {
            $qb->insert('tx_simplelog404_domain_model_logentry')
                ->values([
                    'requesturl' => $requestUri,
                    'statuscode' => 404,
                    'message' => $message,
                    'lasthit' => time(),
                    'hitcount' => 1
                ])->execute();
        } else {
            $hitCount = (int)$logEntry['hitcount'] + 1;
            $qb->update('tx_simplelog404_domain_model_logentry')
                ->set('lasthit', time())
                ->set('hitcount', $hitCount)
                ->where(
                    $qb->expr()->eq('uid', $qb->createNamedParameter($logEntry['uid']))
                )
                ->execute();
        }

        return parent::handlePageError($request, $message, $reasons);
    }

    /**
     * @return QueryBuilder
     */
    protected function getQueryBuilder()
    {
        return GeneralUtility::makeInstance(ConnectionPool::class)
            ->getQueryBuilderForTable('tx_simplelog404_domain_model_logentry');
    }
}
