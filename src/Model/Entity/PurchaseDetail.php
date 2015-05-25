<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PurchaseDetail Entity.
 */
class PurchaseDetail extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'purchase_id' => true,
        'item_id' => true,
        'quantity_purchased' => true,
        'price_of_item' => true,
        'purchase' => true,
        'item' => true,
    ];
}
