<?php
$this->assign('title', 'Blog Posts');
?>

<h1>
    Recent Access Articles
    <?= $this->Html->link('Back', ['action'=>'index'], ['class'=>['pull-right', 'fs12']]); ?>
</h1>

<ul>
    <?php foreach ($checked_articles as $check): ?>
    <?php foreach($posts as $post) : ?>
    <?php if ($check == $post->id) : ?>
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
    <?php endif; ?>
    <?php endforeach; ?>
    <?php endforeach; ?>
</ul>