<?php
$this->assign('title', 'Edit New');
?>

<h1>
    <?= $this->Html->link('Back', ['action'=>'index'], ['class'=>['pull-right', 'fs12']]); ?>
    Edit Post
    <p>
        Articles
    <ul>
        <?php foreach ($items as $item):?>
            <li class="fs12"><?php echo $item->content; ?></li>
        <?php endforeach; ?>
    </ul>
    </p>
</h1>

<?= $this->Form->create($post); ?>
<?= $this->Form->input('title'); ?>
<?= $this->Form->input('body', ['rows'=>'3']); ?>
<?= $this->Form->url('image'); ?>
<br>
<select name="category_id">
    <option>カテゴリを選択してください</option>
    <?php foreach ($categories as $category): ?>
        <option value=<?= h($category['id']); ?> <?= $post['category_id'] == $category['id'] ? 'selected' : "" ?>><?= h($category['name']); ?></option>
    <?php endforeach; ?>
</select>
<br>
<?php foreach ($tags as $tag): ?>
    <?= $checked = ''; ?>
    <?php foreach ($post_tags as $post_tag) {
        if ($post_tag->post_id == $post->id && $tag->id == $post_tag->tag_id) {
            $checked = 'checked';
            break;
        }
    }
    ?>
    <input type="checkbox" name="tag_id[]" value=<?=h($tag->id)?> <?= $checked ?>> <?= h($tag->name) ?>
<?php endforeach; ?>
<br>
<?= $this->Form->button('Update'); ?>
<br>

<?= $this->Form->end(); ?>

本文：<input type="text" name="content" id="content" placeholder="本文">
<button type="button" class="add_item">保存</button>

<script src="https://code.jquery.com/jquery-3.3.1.min.js">
</script>
<script type="text/javascript">
    $('.add_item').click(function() {
        var post_id = <?php echo $post->id; ?>;
        var content = $('#content').val();
        $.ajax(
            {
                type: "POST",
                url: "/items/add",
                data: {
                    "post_id": post_id,
                    "content": content
                },
                dataType: "text",
                success: function (dom)
                {
                    // alert('保存完了');
                    //保存完了
                    //ここで、返り値（dom）を描画する
                    // console.log(dom.getElementsByTagName("ul"));
                    const element = document.createElement("p");
                    const text = document.createTextNode(content);
                    document.body.getElementsByClassName("container")[0].appendChild(element).appendChild(text);
                },
                error: function (XMLHttpRequest, textStatus, errorThrown) //通信失敗
                {
                    alert('処理できませんでした');
                    console.log("XMLHttpRequest : " + XMLHttpRequest.status);
                    console.log("textStatus     : " + textStatus);
                    console.log("errorThrown    : " + errorThrown.message);
                }
            });
    });
</script>
