<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ContestsRestrictionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ContestsRestrictionsTable Test Case
 */
class ContestsRestrictionsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ContestsRestrictionsTable
     */
    public $ContestsRestrictions;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.contests_restrictions',
        'app.contests',
        'app.categories',
        'app.frequencies',
        'app.restrictions',
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
        $config = TableRegistry::exists('ContestsRestrictions') ? [] : ['className' => 'App\Model\Table\ContestsRestrictionsTable'];
        $this->ContestsRestrictions = TableRegistry::get('ContestsRestrictions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ContestsRestrictions);

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
