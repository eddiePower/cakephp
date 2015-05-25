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
        'email' => true,
        'first_name' => true,
        'last_name' => true,
        'address' => true,
        'postcode' => true,
        'phone' => true,
        'notes' => true,
        'customer_type' => true,
        'user_id' => true,
        'user' => true,
    ];
}
