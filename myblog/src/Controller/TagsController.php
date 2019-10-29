<?php

// /posts/index
// /posts
// /(controller)/(action)/(options)

namespace App\Controller;

class TagsController extends AppController
{
    public function index()
    {
        $tags = $this->Tags->find('all');
        $this->set(compact('tags'));
    }

    public function view($id = null)
    {
        $tag = $this->Tags->get($id);
        $this->loadModel('Posts');
        $this->loadModel('PostsTags');
        $posts = $this->Posts->find('all');
        $tag_posts = $this->PostsTags->find('all', array(
            'conditions' => array('tag_id' => $id)
        ));
        $this->set(compact('posts'));
        $this->set(compact('tag'));
        $this->set(compact('tag_posts'));
    }
}