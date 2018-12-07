<?php
namespace Angelo\TddDemo\Tests\Unit\Domain\Repository;

use Nimut\TestingFramework\TestCase\UnitTestCase;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Database\ConnectionPool;

/**
 * Description of PostRatingRepositoryTest
 *
 * @author Angelo Obispo <angelo at deskma.com>
 */
class PostRatingRepositoryTest extends UnitTestCase {
    
    /** @var \TYPO3\CMS\Extbase\Object\ObjectManagerInterface The object manager */
    protected $objectManager;
    
    /**
     *
     * @var \Angelo\TddDemo\Domain\Repository\PostRatingRepository
     * @inject
     */
    protected $prr;
            
    public function setUp()
    {
        $this->objectManager = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Extbase\Object\ObjectManager::class);
        $GLOBALS['TYPO3_CONF_VARS']['DB']['Connections']['Default'] = [
           'charset' => 'utf8',
           'dbname' => 'test',
           'driver' => 'mysqli',
           'host' => 'localhost',
           'password' => '',
           'unix_socket' => '',
           'user' => 'deskma'
        ];
        $connectionPool = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Database\ConnectionPool::class);
        $postConnection =  $connectionPool->getConnectionForTable('tx_tdddemo_domain_model_post');
        $postConnection->bulkInsert(
            'tx_tdddemo_domain_model_post',
            [
               ['content' => 'Test Post 1'],
               ['content' => 'Test Post 2']
            ],
            [
               'content'
            ]
         );
        
        $userConnection =  $connectionPool->getConnectionForTable('tx_tdddemo_domain_model_users');
        $userConnection->bulkInsert(
            'tx_tdddemo_domain_model_users',
            [
               ['username' => 'user1']
            ],
            [
               'username'
            ]
         );
        
    }
    
    public function tearDown()
    {
        $connection = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Database\ConnectionPool::class);
        $connection->getConnectionForTable('tx_tdddemo_domain_model_postrating')->truncate('tx_tdddemo_domain_model_postrating');
        $connection->getConnectionForTable('tx_tdddemo_domain_model_post')->truncate('tx_tdddemo_domain_model_post');
        $connection->getConnectionForTable('tx_tdddemo_domain_model_users')->truncate('tx_tdddemo_domain_model_users');
    }

    /**
     * @test
     */
    public function postRatingRepositoryClassExists() {
        $this->assertTrue(class_exists(\Angelo\TddDemo\Domain\Repository\PostRatingRepository::class));
    }
    
    /**
     * @test
     */
    public function likeMethod() {
        $objectManager = $this->getMockBuilder('TYPO3\\CMS\\Extbase\\Object\\ObjectManagerInterface')->getMock();
        $postRatingRepository = $this->getAccessibleMock(\Angelo\TddDemo\Domain\Repository\PostRatingRepository::class, ['dummy'], [$objectManager]);;
        
        $postRatingRepository->like(1 , 1);
        
        $queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)->getQueryBuilderForTable('tx_tdddemo_domain_model_postrating');
        $like = $queryBuilder
            ->select('tx_tdddemo_domain_model_postrating.like')
            ->from('tx_tdddemo_domain_model_postrating')
            ->where(
                $queryBuilder->expr()->like(
                    'tx_tdddemo_domain_model_postrating.post_id',
                    1
                )
            )
            ->andWhere(
                $queryBuilder->expr()->like(
                    'tx_tdddemo_domain_model_postrating.user_id',
                    1
                )
            )
            ->orderBy($be_user_table.'.uid', 'DESC')
            ->execute()
            ->fetchColumn(0);
        
        $this->assertEquals(1 , $like);
    }
    
    
    /**
     * @test
     */
    public function dislikeMethod() {
        $objectManager = $this->getMockBuilder('TYPO3\\CMS\\Extbase\\Object\\ObjectManagerInterface')->getMock();
        $postRatingRepository = $this->getAccessibleMock(\Angelo\TddDemo\Domain\Repository\PostRatingRepository::class, ['dummy'], [$objectManager]);;
        
        $postRatingRepository->dislike(2 , 1);
        
        $queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)->getQueryBuilderForTable('tx_tdddemo_domain_model_postrating');
        $dislike = $queryBuilder
            ->select('tx_tdddemo_domain_model_postrating.dislike')
            ->from('tx_tdddemo_domain_model_postrating')
            ->where(
                $queryBuilder->expr()->like(
                    'tx_tdddemo_domain_model_postrating.post_id',
                    2
                )
            )
            ->andWhere(
                $queryBuilder->expr()->like(
                    'tx_tdddemo_domain_model_postrating.user_id',
                    1
                )
            )
            ->orderBy($be_user_table.'.uid', 'DESC')
            ->execute()
            ->fetchColumn(0);
        
        $this->assertEquals(1 , $dislike);
    }
    

}
