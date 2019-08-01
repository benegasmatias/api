<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TypePersonsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TypePersonsTable Test Case
 */
class TypePersonsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TypePersonsTable
     */
    public $TypePersons;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.TypePersons'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('TypePersons') ? [] : ['className' => TypePersonsTable::class];
        $this->TypePersons = TableRegistry::getTableLocator()->get('TypePersons', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TypePersons);

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
