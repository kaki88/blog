<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UsersFavoritesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UsersFavoritesTable Test Case
 */
class UsersFavoritesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\UsersFavoritesTable
     */
    public $UsersFavorites;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.users_favorites',
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
        $config = TableRegistry::exists('UsersFavorites') ? [] : ['className' => 'App\Model\Table\UsersFavoritesTable'];
        $this->UsersFavorites = TableRegistry::get('UsersFavorites', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->UsersFavorites);

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
