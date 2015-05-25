<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Purchase Entity.
 */
class Purchase extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'purchase_date' => true,
        'purchase_status' => true,
        'supplier_id' => true,
        'supplier' => true,
        'purchase_details' => true,
    ];
}
