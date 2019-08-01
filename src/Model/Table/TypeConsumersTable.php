<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TypeConsumers Model
 *
 * @method \App\Model\Entity\TypeConsumer get($primaryKey, $options = [])
 * @method \App\Model\Entity\TypeConsumer newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TypeConsumer[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TypeConsumer|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TypeConsumer saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TypeConsumer patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TypeConsumer[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TypeConsumer findOrCreate($search, callable $callback = null, $options = [])
 */
class TypeConsumersTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('type_consumers');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('name_type_consumer')
            ->maxLength('name_type_consumer', 50)
            ->requirePresence('name_type_consumer', 'create')
            ->notEmptyString('name_type_consumer');

        return $validator;
    }
}
