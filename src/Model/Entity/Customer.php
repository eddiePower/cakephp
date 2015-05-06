<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Customer Entity.
 */
class Customer extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'name' => true,
        'cardnum' => true,
        'phone' => true,
        'balance' => true,
        'type' => true,
        'user_id' => true,
        'user' => true,
    ];
}