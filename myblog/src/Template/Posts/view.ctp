<?php
$this->assign('title', 'Blog Detail');
?>

<h1>
    <?= $this->Html->image($post->image, array('height' => 100, 'width' => 100)); ?>
    <?= $this->Html->link('Back', ['action'=>'index'], ['class'=>['pull-right', 'fs12']]); ?>
    <?= h($post->title); ?>
    <?= $this->Html->link($category->name, ['controller'=>'Categories', 'action'=>'view', $category->id], ['class'=>['fs12']]); ?>
</h1>

<h1>
    <?php foreach ($post_tags as $post_tag): ?>
        <?php foreach ($tags as $tag): ?>
        <?php if ($post_tag->tag_id == $tag->id): ?>
            <?= $this->Html->link($tag->name, ['controller'=>'Tags', 'action'=>'view', $tag->id], ['class'=>['fs12']]);
            break; ?>
        <?php endif; ?>
        <?php endforeach; ?>
    <?php endforeach;?>
</h1>

<h1>
    Articles
    <ul>
        <?php foreach ($items as $item):?>
            <li class="fs12"><?php echo $item->content; ?></li>
        <?php endforeach; ?>
    </ul>
</h1>

<p><?= nl2br(h($post->body)); ?></p>

<?php if (count($post->comments)) : ?>
<h2>Comments <span class="fs12">(<?= count($post->commets); ?>)</span></h2>
<ul>
    <?php foreach ($post->comments as $comment) : ?>
    <li>
        <?= h($comment->body); ?>
        <?=
        $this->Form->postLink(
            '[x]',
            ['controller'=>'Comments', 'action'=>'delete', $comment->id],
            ['confirm'=>'Are you sure?', 'class'=>'fs12']
        );
        ?>
    </li>
    <?php endforeach; ?>
</ul>
<?php endif; ?>

<h2>New Comment</h2>
<?= $this->Form->create(null, [
        'url' => ['controller'=>'Comments', 'action'=>'add']
]); ?>
<?= $this->Form->input('body'); ?>
<?= $this->Form->hidden('post_id', ['value'=>$post->id]); ?>
<?= $this->Form->button('Add'); ?>
<?= $this->Form->end(); ?>

