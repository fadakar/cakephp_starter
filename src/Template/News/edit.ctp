<?php $this->start('title') ?>
<div class="flex items-center gap-4">
    <?php if ($news->id) : ?>
        <div>ویرایش خبر</div>
    <?php else: ?>
        <div>افزودن خبر جدید</div>
    <?php endif; ?>
    <i class="text-gray-600 fa fa-edit"></i>
</div>
<?php $this->end() ?>

<div style="max-width: 80%; margin: 0 auto;">
    <?=
    $this->Form->create($news, [
        'url' => [
            'controller' => 'news',
            'action' => $news->id ? 'edit' : 'add',
        ],
        'type' => 'post'
    ])
    ?>

    <?= $this->Form->control('category_id', ['options' => $categories, 'label' => 'دسته']) ?>

    <?= $this->Form->control('title', ['error' => false, 'label' => 'عنوان']) ?>
    <span style="color: red;font-size: 12px;"><?= $this->Form->error('title') ?></span>

    <?= $this->Form->control('body', ['label' => 'محتوا']) ?>

    <?= $this->Form->control('tags_string', ['error' => false, 'label' => 'برچسب']) ?>

    <?= $this->Form->submit('ثبت', ['class' => 'button primary mt-2']) ?>
    <?php $this->Form->end() ?>
</div>

