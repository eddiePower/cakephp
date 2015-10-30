<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * OrderDetail Entity.
 */
class OrderDetail extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'item_id' => true,
        'order_id' => true,
        'quantity_ordered' => true,
        'per_unit' => true,
        'discount' => true,
        'item' => true,
        'order' => true,
        'user_id' => true,
    ];
}
