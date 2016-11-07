<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ContestsZonesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ContestsZonesTable Test Case
 */
class ContestsZonesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ContestsZonesTable
     */
    public $ContestsZones;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.contests_zones',
        'app.contests',
        'app.categories',
        'app.frequencies',
        'app.restrictions',
        'app.contests_restrictions',
        'app.zones'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ContestsZones') ? [] : ['className' => 'App\Model\Table\ContestsZonesTable'];
        $this->ContestsZones = TableRegistry::get('ContestsZones', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ContestsZones);

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
