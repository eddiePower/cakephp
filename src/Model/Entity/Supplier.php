<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Supplier Entity.
 */
class Supplier extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'supplier_name' => true,
        'supplier_description' => true,
        'purchases' => true,
    ];
}
