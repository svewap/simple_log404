<?php
namespace Nerdost\SimpleLog404\Error\PageErrorHandler;

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;

class PageContentErrorHandler extends \TYPO3\CMS\Core\Error\PageErrorHandler\PageContentErrorHandler
{

    /**
     * @param ServerRequestInterface $request
     * @param string $message
     * @param array $reasons
     * @return ResponseInterface
     * @throws \RuntimeException
     * @throws NoSuchCacheException
     */
    public function handlePageError(ServerRequestInterface $request, string $message, array $reasons = []): ResponseInterface
    {
        /** @var \TYPO3\CMS\Core\Http\NormalizedParams $params */
        $params = $request->getAttributes()['normalizedParams'];
        $requestUri = $params->getRequestUrl();

        $qb = self::getQueryBuilder();
        $logEntry = $qb->select('*')->from('tx_simplelog404_domain_model_logentry')
            ->where(
                $qb->expr()->eq('requesturl', $qb->createNamedParameter($requestUri))
            )->execute()->fetch();

        $qb = self::getQueryBuilder();

        if(false === $logEntry) {
            $qb->insert('tx_simplelog404_domain_model_logentry')
                ->values([
                    'requesturl' => $requestUri,
                    'statuscode' => 404,
                    'message' => $message,
                    'lasthit' => time(),
                    'hitcount' => 1
                ])->execute();
        } else {
            $hitCount = (int) $logEntry['hitcount'] + 1;
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
     * @return \TYPO3\CMS\Core\Database\Query\QueryBuilder
     */
    protected function getQueryBuilder() {
        return \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Database\ConnectionPool::class)
            ->getQueryBuilderForTable('tx_simplelog404_domain_model_logentry');
    }
}