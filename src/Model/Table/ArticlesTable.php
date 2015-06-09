<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class ArticlesTable extends Table
{
    public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');
        
        //Added after migration for catagory tree.
        // Just add the belongsTo relation with CategoriesTable
        $this->belongsTo('Categories', [
            'foreignKey' => 'category_id',
        ]);
    }

    public function validationDefault(Validator $validator)
    {
        $validator
            ->notEmpty('title')
            ->notEmpty('category')
            ->add('category', 'inList', [
                'rule' => ['inList', ['category_name']],
                'message' => 'Please choose a valid Category'])
            ->notEmpty('body');

        return $validator;
    }
}