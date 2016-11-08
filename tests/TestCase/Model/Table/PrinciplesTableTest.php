<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PrinciplesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PrinciplesTable Test Case
 */
class PrinciplesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PrinciplesTable
     */
    public $Principles;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.principles'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Principles') ? [] : ['className' => 'App\Model\Table\PrinciplesTable'];
        $this->Principles = TableRegistry::get('Principles', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Principles);

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
