<?php $this->start('title') ?>
<div class="flex items-center gap-4">
    <div>ویرایش دسته </div>
    <i class="text-gray-600 fa fa-edit"></i>
</div>
<?php $this->end() ?>

<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $category->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $category->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Category'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Parent Category'), ['controller' => 'Category', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Parent Category'), ['controller' => 'Category', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="category form large-9 medium-8 columns content">
    <?= $this->Form->create($category) ?>
    <fieldset>
        <legend><?= __('Edit Category') ?></legend>
        <?php
            echo $this->Form->control('title');
            echo $this->Form->control('description');
            echo $this->Form->control('parent_id', ['options' => $parentCategory, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
