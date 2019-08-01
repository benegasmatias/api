<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Sex Entity
 *
 * @property int $id_sex
 * @property string $type_sex
 *
 * @property \App\Model\Entity\Client[] $clients
 */
class Sex extends Entity
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
        'type_sex' => true,
        'clients' => true
    ];
}
