<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Client Entity
 *
 * @property int $id_client
 * @property string|null $name_client
 * @property int $type_consumers_id
 * @property int $sex_id
 * @property int $type_people_id
 * @property int $department
 *
 * @property \App\Model\Entity\TypeConsumer $type_consumer
 * @property \App\Model\Entity\Sex $sex
 * @property \App\Model\Entity\TypePeople $type_people
 * @property \App\Model\Entity\Department $departmentt
 */
class Client extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'name_client' => true,
        'client_dni'=> true,
        'client_apellido'=>true,
        'client_email'=>true,
        'client_celular'=>true,
        'client_fijo'=>true,
        'client_direccion'=>true,
        'fecha'=>true,
        'type_consumer_id' => true,
        'sex_id' => true,
        'type_people_id' => true,
        'department_id'=> true,

    ];
}
