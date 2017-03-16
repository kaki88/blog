<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UsersDotationsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UsersDotationsTable Test Case
 */
class UsersDotationsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\UsersDotationsTable
     */
    public $UsersDotations;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.users_dotations',
        'app.users',
        'app.cities',
        'app.roles',
        'app.posts',
        'app.contests',
        'app.users_votes',
        'app.categories',
        'app.frequencies',
        'app.principles',
        'app.restrictions',
        'app.contests_restrictions',
        'app.zones',
        'app.contests_zones'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('UsersDotations') ? [] : ['className' => 'App\Model\Table\UsersDotationsTable'];
        $this->UsersDotations = TableRegistry::get('UsersDotations', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->UsersDotations);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
