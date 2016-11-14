<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UsersMarkersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UsersMarkersTable Test Case
 */
class UsersMarkersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\UsersMarkersTable
     */
    public $UsersMarkers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.users_markers',
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
        $config = TableRegistry::exists('UsersMarkers') ? [] : ['className' => 'App\Model\Table\UsersMarkersTable'];
        $this->UsersMarkers = TableRegistry::get('UsersMarkers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->UsersMarkers);

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
