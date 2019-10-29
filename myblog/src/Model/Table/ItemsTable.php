<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class ItemsTable extends Table
{
    public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');
        $this->belongsTo('Posts');
    }

    public function validationDefault(Validator $validator)
    {
        $validator
            ->notEmpty('post_id')
            ->requirePresence('post_id')
            ->notEmpty('content')
            ->requirePresence('content');


        return $validator;
    }
}