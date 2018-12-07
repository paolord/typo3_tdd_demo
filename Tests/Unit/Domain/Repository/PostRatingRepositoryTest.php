<?php
namespace Angelo\TddDemo\Tests\Unit\Domain\Repository;

use Nimut\TestingFramework\TestCase\UnitTestCase;

/**
 * Description of PostRatingRepositoryTest
 *
 * @author Angelo Obispo <angelo at deskma.com>
 */
class PostRatingRepositoryTest extends UnitTestCase {
    
    /** @var \TYPO3\CMS\Extbase\Object\ObjectManagerInterface The object manager */
    protected $objectManager;
    
    /**
     * @test
     */
    public function postRatingRepositoryClassExists() {
        $this->assertTrue(class_exists(\Angelo\TddDemo\Domain\Repository\PostRatingRepository::class));
    }

}
