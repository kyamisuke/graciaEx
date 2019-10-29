<?php
$this->assign('title', 'Blog Posts');
?>

<h1>
    Categories List
    <?= $this->Html->link('Back', ['controller'=>'Posts', 'action'=>'index'], ['class'=>['pull-right', 'fs12']]); ?>
</h1>

<ul>
    <?php foreach($categories as $category) : ?>
        <li>
            <?= $this->Html->link($category->name, ['action'=>'view', $category->id]); ?>
        </li>
    <?php endforeach; ?>
</ul>