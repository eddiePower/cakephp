<?php
namespace App\Model\Entity;

use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Entity;

/**
 * User Entity.
 */
class User extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'email' => true,
        'password' => true,
        'role' => true,
        'bookmarks' => true,
    ];
    
    
    //password hasing in the view details of user
    protected function _setPassword($value)
    {
        $hasher = new DefaultPasswordHasher();
        
        return $hasher->hash($value);
    }
}