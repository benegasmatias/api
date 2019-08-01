<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TypePeoplesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TypePeoplesTable Test Case
 */
class TypePeoplesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TypePeoplesTable
     */
    public $TypePeoples;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.TypePeoples',
        'app.Clients'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('TypePeoples') ? [] : ['className' => TypePeoplesTable::class];
        $this->TypePeoples = TableRegistry::getTableLocator()->get('TypePeoples', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TypePeoples);

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
