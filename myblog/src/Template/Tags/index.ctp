<?php
$this->assign('title', 'Blog Posts');
?>

<h1>
    Tags List
    <?= $this->Html->link('Back', ['controller'=>'Posts', 'action'=>'index'], ['class'=>['pull-right', 'fs12']]); ?>
</h1>

<ul>
    <?php foreach($tags as $tag) : ?>
        <li>
            <?= $this->Html->link($tag->name, ['action'=>'view', $tag->id]); ?>
        </li>
    <?php endforeach; ?>
</ul>