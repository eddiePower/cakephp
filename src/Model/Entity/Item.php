<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Item Entity.
 */
class Item extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'item_name' => true,
        'quantity_on_hand' => true,
        'item_number' => true,
        'barcode' => true,
        'photo' => true,
        'photo_dir' => true,
        'order_details' => true,
        'purchase_details' => true,
    ];
}
