<?php
namespace App\Model\Table;

use App\Model\Entity\Courier;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Couriers Model
 */
class CouriersTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('couriers');
        $this->displayField('courier_name');
        $this->primaryKey('id');
        $this->hasMany('Orders', [
            'foreignKey' => 'courier_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create');
            
        $validator
            ->requirePresence('courier_name', 'create')
            ->notEmpty('courier_name');
            
        $validator
            ->add('courier_charge', 'valid', ['rule' => 'numeric'])
            ->requirePresence('courier_charge', 'create')
            ->notEmpty('courier_charge');

        return $validator;
    }
}
