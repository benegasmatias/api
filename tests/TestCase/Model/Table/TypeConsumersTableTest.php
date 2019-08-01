<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TypeConsumersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TypeConsumersTable Test Case
 */
class TypeConsumersTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TypeConsumersTable
     */
    public $TypeConsumers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.TypeConsumers'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('TypeConsumers') ? [] : ['className' => TypeConsumersTable::class];
        $this->TypeConsumers = TableRegistry::getTableLocator()->get('TypeConsumers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TypeConsumers);

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
