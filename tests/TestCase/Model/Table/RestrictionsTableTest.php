<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RestrictionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RestrictionsTable Test Case
 */
class RestrictionsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\RestrictionsTable
     */
    public $Restrictions;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.restrictions',
        'app.contests',
        'app.categories',
        'app.frequencies',
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
        $config = TableRegistry::exists('Restrictions') ? [] : ['className' => 'App\Model\Table\RestrictionsTable'];
        $this->Restrictions = TableRegistry::get('Restrictions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Restrictions);

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
}
