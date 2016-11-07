<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ContestsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ContestsTable Test Case
 */
class ContestsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ContestsTable
     */
    public $Contests;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.contests',
        'app.categories',
        'app.frequencies',
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
        $config = TableRegistry::exists('Contests') ? [] : ['className' => 'App\Model\Table\ContestsTable'];
        $this->Contests = TableRegistry::get('Contests', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Contests);

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
