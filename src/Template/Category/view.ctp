<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Category $category
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Category'), ['action' => 'edit', $category->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Category'), ['action' => 'delete', $category->id], ['confirm' => __('Are you sure you want to delete # {0}?', $category->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Category'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Category'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Parent Category'), ['controller' => 'Category', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Parent Category'), ['controller' => 'Category', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Child Category'), ['controller' => 'Category', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Child Category'), ['controller' => 'Category', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="category view large-9 medium-8 columns content">
    <h3><?= h($category->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($category->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Parent Category') ?></th>
            <td><?= $category->has('parent_category') ? $this->Html->link($category->parent_category->title, ['controller' => 'Category', 'action' => 'view', $category->parent_category->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($category->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Lft') ?></th>
            <td><?= $this->Number->format($category->lft) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Rght') ?></th>
            <td><?= $this->Number->format($category->rght) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($category->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($category->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($category->description)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Category') ?></h4>
        <?php if (!empty($category->child_category)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Title') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Lft') ?></th>
                <th scope="col"><?= __('Rght') ?></th>
                <th scope="col"><?= __('Parent Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($category->child_category as $childCategory): ?>
            <tr>
                <td><?= h($childCategory->id) ?></td>
                <td><?= h($childCategory->title) ?></td>
                <td><?= h($childCategory->description) ?></td>
                <td><?= h($childCategory->lft) ?></td>
                <td><?= h($childCategory->rght) ?></td>
                <td><?= h($childCategory->parent_id) ?></td>
                <td><?= h($childCategory->created) ?></td>
                <td><?= h($childCategory->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Category', 'action' => 'view', $childCategory->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Category', 'action' => 'edit', $childCategory->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Category', 'action' => 'delete', $childCategory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $childCategory->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
