<?php

// /posts/index
// /posts
// /(controller)/(action)/(options)

namespace App\Controller;

class ItemsController extends AppController
{
    public function add() {
        $this->viewBuilder()->setLayout(false);

        $_item = $this->Items->newEntity();
        $item = $this->Items->patchEntity($_item, $this->request->getData());
        $this->Items->save($item);
        $this->set(compact('item'));
    }


    public function isAuthorized($user)
    {
        return true;
    }

}