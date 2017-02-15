<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UsersVotesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UsersVotesTable Test Case
 */
class UsersVotesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\UsersVotesTable
     */
    public $UsersVotes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.users_votes',
        'app.users',
        'app.cities',
        'app.roles',
        'app.posts',
        'app.contests',
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
        $config = TableRegistry::exists('UsersVotes') ? [] : ['className' => 'App\Model\Table\UsersVotesTable'];
        $this->UsersVotes = TableRegistry::get('UsersVotes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->UsersVotes);

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
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
