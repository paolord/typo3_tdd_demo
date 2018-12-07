<?php
namespace Angelo\TddDemo\Domain\Repository;

use \TYPO3\CMS\Extbase\Persistence\Repository;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Database\ConnectionPool;
/**
 * Description of PostRatingRepository
 *
 * @author Angelo Obispo <angelo at deskma.com>
 */
class PostRatingRepository extends Repository {
    
    /**
     * inserts a like record in postrating table
     * 
     * @param int $postId
     * @param int $userId
     */
    public function like ($postId, $userId) {
        $queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)->getQueryBuilderForTable('tx_tdddemo_domain_model_postrating');
               
        $queryBuilder
            ->insert('tx_tdddemo_domain_model_postrating')
            ->values([
                'post_id' => $postId,
                'user_id' => $userId,
                'like' => 1,
                'dislike' => 0
            ])
            ->execute();
    }
    
        
    /**
     * inserts a dislike record in postrating table
     * 
     * @param int $postId
     * @param int $userId
     */
    public function dislike ($postId, $userId) {
        $queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)->getQueryBuilderForTable('tx_tdddemo_domain_model_postrating');
               
        $queryBuilder
            ->insert('tx_tdddemo_domain_model_postrating')
            ->values([
                'post_id' => $postId,
                'user_id' => $userId,
                'like' => 0,
                'dislike' => 1
            ])
            ->execute();
    }
}