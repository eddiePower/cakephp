<?php
namespace App\Model\Table;

use App\Model\Entity\Supplier;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Suppliers Model
 */
class SuppliersTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('suppliers');
        $this->displayField('id');
        $this->primaryKey('id');
        $this->hasMany('Purchases', [
            'foreignKey' => 'supplier_id'
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
            ->requirePresence('supplier_name', 'create')
            ->notEmpty('supplier_name');
            
        $validator
            ->requirePresence('supplier_description', 'create')
            ->notEmpty('supplier_description');

        return $validator;
    }
}
