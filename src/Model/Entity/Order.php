<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Order Entity.
 */
class Order extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'ordered_date' => true,
        'required_date' => true,
        'status' => true,
        'courier_id' => true,
        'customer_id' => true,
        'courier' => true,
        'customer' => true,
        'order_details' => true,
    ];
}
