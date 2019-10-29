<?php
$this->assign('title', 'Blog Posts');
?>

<h1>
    Blog Posts
    <?= $this->Html->link('Add New', ['action'=>'add'], ['class'=>['pull-right', 'fs12']]); ?>
    <?= $this->Html->link('Categories List', ['controller'=>'Categories', 'action'=>'index'], ['class'=>['pull-right', 'fs12']]); ?>
    <?= $this->Html->link('Tags List', ['controller'=>'Tags', 'action'=>'index'], ['class'=>['pull-right', 'fs12']]); ?>
</h1>

<ul>
    <?php foreach($posts as $post) : ?>
        <li>
            <?= $this->Html->image($post->image, array('height' => 100, 'width' => 100)) ?>
            <?= $this->Html->link($post->title, ['action'=>'view', $post->id]); ?>
            <?= $this->Html->link('[Edit]', ['action'=>'edit', $post->id], ['class'=>'fs12']); ?>
            <?=
            $this->Form->postLink(
                '[x]',
                ['action'=>'delete', $post->id],
                ['confirm'=>'Are you sure?', 'class'=>'fs12']
            );
            ?>
        </li>
    <?php endforeach; ?>
</ul>