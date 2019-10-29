<?php

// /posts/index
// /posts
// /(controller)/(action)/(options)

namespace App\Controller;

class CategoriesController extends AppController
{
    public function index()
    {
        $categories = $this->Categories->find('all');
        $this->set(compact('categories'));
    }

    public function view($id = null)
    {
        $category = $this->Categories->get($id);
        $this->loadModel('Posts');
        $posts = $this->Posts->find('all');
        $this->set(compact('posts'));
        $this->set(compact('category'));
    }
}