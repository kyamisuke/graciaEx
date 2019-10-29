<?php

// /posts/index
// /posts
// /(controller)/(action)/(options)

namespace App\Controller;

class PostsController extends AppController
{
    public function index()
    {
        $posts = $this->Posts->find('all');
        $this->set(compact('posts'));
    }

    public function view($id = null)
    {
        $post = $this->Posts->get($id, [
            'contain' => 'Comments'
        ]);
        $this->loadModel('Categories');
        $category = $this->Categories->get($post->category_id);
        $this->loadModel('PostsTags');
        $post_tags = $this->PostsTags->find('all', array(
            'conditions' => array('post_id' => $id)
        ));
        $this->loadModel('Tags');
        $tags = $this->Tags->find('all');

        $this->set(compact('post'));
        $this->set(compact('category'));
        $this->set(compact('post_tags'));
        $this->set(compact('tags'));
    }

    public function add()
    {
        $post = $this->Posts->newEntity();
        $post->title = "New Post";
        $this->Posts->save($post);
        return $this->redirect(['action'=>'edit', $post->id]);
        $this->set(compact('post'));
    }

    public function edit($id = null)
    {
        $this->loadModel('Categories');
        $categories = $this->Categories->find('all');
        $this->set(compact('categories'));
        $this->loadModel('Tags');
        $tags = $this->Tags->find('all');
        $this->set(compact('tags'));
        $this->loadModel('PostsTags');
        $post = $this->Posts->get($id);
        $post_tags = $this->PostsTags->find('all');
        $this->set(compact('post_tags'));
        if ($this->request->is(['post', 'patch', 'put'])) {
            $this->PostsTags->deleteAll(array('post_id' => $id), false);
            $post = $this->Posts->patchEntity($post, $this->request->data);
            foreach ($post->tag_id as $tag_id) {
                $post_tag = $this->PostsTags->newEntity();
                $post_tag->post_id = $id;
                $post_tag->tag_id = $tag_id;
                $this->PostsTags->save($post_tag);
            }
            if ($this->Posts->save($post)) {
                $this->Flash->success('Edit Success!');
                return $this->redirect(['action'=>'index']);
            } else {
                // error
                $this->Flash->error('Edit Error!');
            }
        }
        $this->set(compact('post'));
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $post = $this->Posts->get($id);
        if ($this->Posts->delete($post)) {
            $this->Flash->success('Delete Success!');
        } else {
            // error
            $this->Flash->error('Delete Error!');
        }
        return $this->redirect(['action'=>'index']);
    }
}