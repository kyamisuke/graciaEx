<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class PostsTable extends Table
{
    public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');
        $this->hasMany('Comments');
        $this->hasMany('Categories');
        $this->hasMany('Items');
        $this->belongsToMany('Tags');
    }

    public function validationDefault(Validator $validator)
    {
        $validator
            ->notEmpty('title')
            ->requirePresence('title')
            ->notEmpty('body')
            ->requirePresence('body')
            ->notEmpty('image')
            ->requirePresence('image')
            ->notEmpty('category_id')
            ->requirePresence('category_id')
            ->add('body', [
                'length' => [
                    'rule' => ['minLength', 10],
                    'message' => 'body length must be 10+',
                    'dependent' => 'true'
                ]
            ]);

        return $validator;
    }
}