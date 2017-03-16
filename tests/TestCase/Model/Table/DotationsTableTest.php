<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DotationsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DotationsTable Test Case
 */
class DotationsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DotationsTable
     */
    public $Dotations;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.dotations',
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
        $config = TableRegistry::exists('Dotations') ? [] : ['className' => 'App\Model\Table\DotationsTable'];
        $this->Dotations = TableRegistry::get('Dotations', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Dotations);

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
