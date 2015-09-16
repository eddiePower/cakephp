<?php
namespace App\Model\Table;

use App\Model\Entity\Item;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Items Model
 */
class ItemsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('items');
        $this->displayField('id');
        $this->primaryKey('id');
        $this->hasMany('OrderDetails', [
            'foreignKey' => 'item_id'
        ]);
        $this->hasMany('PurchaseDetails', [
            'foreignKey' => 'item_id'
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
            ->allowEmpty('id', 'create')
            ->requirePresence('item_name', 'create')
            ->notEmpty('item_name')
            ->add('quantity_on_hand', 'valid', ['rule' => 'numeric'])
            ->requirePresence('quantity_on_hand', 'create')
            ->notEmpty('quantity_on_hand')
            ->add('item_number', 'valid', ['rule' => 'numeric'])
            ->requirePresence('item_number', 'create')
            ->notEmpty('item_number')
            ->add('barcode', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('photo', 'photo_dir', 'barcode');

        return $validator;
    }
}
