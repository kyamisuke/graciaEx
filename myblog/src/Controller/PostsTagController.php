<?php

// /posts/index
// /posts
// /(controller)/(action)/(options)

namespace App\Controller;

class PostsTagController extends AppController
{
    public function index()
    {
        $post = $this->Posts->newEntity();
        $post->title = "New Post";
        $this->Posts->save($post);
        return $this->redirect(['action'=>'edit', $post->id]);
        $this->set(compact('post'));
    }

    public function view($id = null)
    {
//        $this->loadModel('Categories');
//        $categories = $this->Categories->find('all');
//        $this->set(compact('categories'));
//        $this->loadModel('Tags');
//        $tags = $this->Tags->find('all');
//        $this->set(compact('tags'));
//        $post = $this->Posts->get($id);
//        if ($this->request->is(['post', 'patch', 'put'])) {
//            $post = $this->Posts->patchEntity($post, $this->request->data);
//            if ($this->Posts->save($post)) {
//                $this->Flash->success('Edit Success!');
//                return $this->redirect(['action'=>'index']);
//            } else {
//                // error
//                $this->Flash->error('Edit Error!');
//            }
//        }
//        $this->set(compact('post'));
    }
}