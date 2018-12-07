<?php
namespace Angelo\TddDemo\Domain\Repository;

use \TYPO3\CMS\Extbase\Persistence\Repository;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Database\ConnectionPool;

/**
 * Description of UserRepository
 *
 * @author Angelo Obispo <angelo at deskma.com>
 */
class UserRepository extends Repository {
    
    /**
     * Checks DB if user exists
     * 
     * @param int $user
     */
    public function userExists($user) {
        $queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)->getQueryBuilderForTable('tx_tdddemo_domain_model_user');
                
        $statement = $queryBuilder
                ->select('tx_tdddemo_domain_model_user.*')
                ->from('tx_tdddemo_domain_model_user')
                ->where(
                    $queryBuilder->expr()->eq('tx_deskmaadmin_domain_model_company.uid', $user)
                )
                ->execute()
                ->fetch();
        
        if (!empty($statement)) {
            return true;
        }
        
        return false;
    }
}
