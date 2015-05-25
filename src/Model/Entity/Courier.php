<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Courier Entity.
 */
class Courier extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'courier_name' => true,
        'courier_charge' => true,
        'orders' => true,
    ];
}
