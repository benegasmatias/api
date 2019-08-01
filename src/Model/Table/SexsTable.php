<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Sexs Model
 *
 * @property \App\Model\Table\ClientsTable|\Cake\ORM\Association\HasMany $Clients
 *
 * @method \App\Model\Entity\Sex get($primaryKey, $options = [])
 * @method \App\Model\Entity\Sex newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Sex[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Sex|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Sex saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Sex patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Sex[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Sex findOrCreate($search, callable $callback = null, $options = [])
 */
class SexsTable extends Table
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

        $this->setTable('sexs');
        $this->setDisplayField('id_sex');
        $this->setPrimaryKey('id_sex');

        $this->hasMany('Clients', [
            'foreignKey' => 'sex_id'
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
            ->integer('id_sex')
            ->allowEmptyString('id_sex', null, 'create');

        $validator
            ->scalar('type_sex')
            ->maxLength('type_sex', 30)
            ->requirePresence('type_sex', 'create')
            ->notEmptyString('type_sex');

        return $validator;
    }
}
