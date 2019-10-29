<?php
$this->assign('title', 'Blog Detail');
?>

<h1>
    <?= $this->Html->link('Back', ['action'=>'index'], ['class'=>['pull-right', 'fs12']]); ?>
    <?= h($tag->name); ?>
</h1>

<ul>
    <?php foreach($tag_posts as $tag_post) : ?>
    <?php foreach($posts as $post) : ?>
    <?php if($post->id == $tag_post->post_id) : ?>
        <li>
            <?= $this->Html->image($post->image, array('height' => 100, 'width' => 100)) ?>
            <?= $this->Html->link($post->title, ['controller'=>'Posts', 'action'=>'view', $post->id]); ?>
            <?= $this->Html->link('[Edit]', ['controller'=>'Posts', 'action'=>'edit', $post->id], ['class'=>'fs12']); ?>
            <?=
            $this->Form->postLink(
                '[x]',
                ['controller'=>'Posts', 'action'=>'delete', $post->id],
                ['confirm'=>'Are you sure?', 'class'=>'fs12']
            );
            ?>
        </li>
    <?Php endif; ?>
    <?php endforeach; ?>
    <?php endforeach; ?>
</ul>
