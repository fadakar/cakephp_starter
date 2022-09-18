<div style="max-width: 80%; margin: 0 auto;">
    <ul style="margin-top: 20px;">
        <li>id: <?= $news->id ?></li>
        <li>title: <?= $news->title ?></li>
        <li>body: <?= $news->body ?></li>
        <li>category: <?= isset($news->category) ? $news->category->title : '---' ?></li>
        <li>
            tags:
            <ol type="1">
                <?php foreach ($news->tags as $tag): ?>
                    <li><?= $tag->title ?></li>
                <?php endforeach; ?>
            </ol>
        </li>
    </ul>
</div>

<?php $this->start('menu') ?>
<li>
    <?php
    echo $this->Html->link(
        'Create +',
        ['controller' => 'news', 'action' => 'add']
    )
    ?>
</li>
<li>
    <?php
    echo $this->Html->link(
        'List',
        ['controller' => 'news', 'action' => 'index']
    )
    ?>
</li>
<?php $this->end() ?>
