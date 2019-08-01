<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TypePersons Model
 *
 * @method \App\Model\Entity\TypePerson get($primaryKey, $options = [])
 * @method \App\Model\Entity\TypePerson newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TypePerson[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TypePerson|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TypePerson saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TypePerson patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TypePerson[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TypePerson findOrCreate($search, callable $callback = null, $options = [])
 */
class TypePersonsTable extends Table
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

        $this->setTable('type_persons');
        $this->setDisplayField('id_person');
        $this->setPrimaryKey('id_person');
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
            ->integer('id_person')
            ->allowEmptyString('id_person', null, 'create');

        $validator
            ->scalar('name_type_persons')
            ->maxLength('name_type_persons', 50)
            ->requirePresence('name_type_persons', 'create')
            ->notEmptyString('name_type_persons');

        return $validator;
    }
}
