<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Clients Model
 *
 * @property \App\Model\Table\TypeConsumersTable|\Cake\ORM\Association\BelongsTo $TypeConsumers
 * @property \App\Model\Table\SexesTable|\Cake\ORM\Association\BelongsTo $Sexes
 * @property \App\Model\Table\TypePeoplesTable|\Cake\ORM\Association\BelongsTo $TypePeoples
 *
 * @method \App\Model\Entity\Client get($primaryKey, $options = [])
 * @method \App\Model\Entity\Client newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Client[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Client|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Client saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Client patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Client[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Client findOrCreate($search, callable $callback = null, $options = [])
 */
class ClientsTable extends Table
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

        $this->setTable('clients');
        $this->setDisplayField('id_client');
        $this->setPrimaryKey('id_client');

        $this->belongsTo('TypeConsumers', [
            'foreignKey' => 'type_consumers_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Sexes', [
            'foreignKey' => 'sex_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('TypePeoples', [
            'foreignKey' => 'type_people_id',
            'joinType' => 'INNER'
        ]);
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
            ->integer('id_client')
            ->allowEmptyString('id_client', null, 'create');

        $validator
            ->scalar('name_client')
            ->maxLength('name_client', 50)
            ->allowEmptyString('name_client');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['type_consumers_id'], 'TypeConsumers'));
        $rules->add($rules->existsIn(['sex_id'], 'Sexes'));
        $rules->add($rules->existsIn(['type_people_id'], 'TypePeoples'));

        return $rules;
    }
}
