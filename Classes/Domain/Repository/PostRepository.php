<?php
namespace Angelo\TddDemo\Domain\Repository;

use \TYPO3\CMS\Extbase\Persistence\Repository;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Database\ConnectionPool;

/**
 * Description of PostRepository
 *
 * @author Angelo Obispo <angelo at deskma.com>
 */
class PostRepository extends Repository {
    
    /**
     * Checks DB if post exists
     * 
     * @param int $post
     */
    public function postExists($post) {
        $queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)->getQueryBuilderForTable('tx_tdddemo_domain_model_post');
               
        $statement = $queryBuilder
                ->select('tx_tdddemo_domain_model_post.*')
                ->from('tx_tdddemo_domain_model_post')
                ->where(
                    $queryBuilder->expr()->eq('tx_tdddemo_domain_model_post.uid', $post)
                )
                ->execute()
                ->fetch();
        
        if (!empty($statement)) {
            return true;
        }
        
        return false;
    }
}
