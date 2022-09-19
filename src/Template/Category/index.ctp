<?php $this->start('title') ?>
<div class="flex items-center gap-4">
    <div>لیست دسته ها</div>
    <i class="text-gray-600 fa fa-radio"></i>
</div>
<?php $this->end() ?>

<?php $this->start('topbar-actions') ?>
<a class="button green" href="<?= $this->Url->build(['controller' => 'category', 'action' => 'add']) ?>">
    دسته جدید
    <i class="fa fa-plus"></i>
</a>
<?php $this->end() ?>

<div class="overflow-x-auto relative">
    <table class="w-full text-sm  text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            <th scope="col" class="py-3 px-6">
                #
            </th>
            <th scope="col" class="py-3 px-6">
                دسته پدر
            </th>
            <th scope="col" class="py-3 px-6">
                عنوان
            </th>
            <th scope="col" class="py-3 px-6">
            </th>
        </tr>
        </thead>
        <tbody>

        <?php foreach ($category as $item) : ?>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th class="py-4 px-6">
                    <?= $this->Number->format($item->id) ?>
                </th>
                <td class="py-4 px-6">
                    <?= $item->has('parent_category') ? $this->Html->link($item->parent_category->title, ['controller' => 'Category', 'action' => 'view', $item->parent_category->id]) : '' ?>
                </td>
                <td class="py-4 px-6">
                    <?= h($item->title) ?>
                </td>
                <td class="flex gap-2 items-center justify-end">
                    <a href="<?= $this->Url->build(['controller' => 'category', 'action' => 'view', $item->id]) ?>"
                       class="button secondary">
                        <i class="fa fa-eye"></i>
                    </a>

                    <a href="<?= $this->Url->build(['controller' => 'category', 'action' => 'edit', $item->id]) ?>"
                       class="button secondary">
                        <i class="fa fa-edit"></i>
                    </a>

                    <a href="<?= $this->Url->build(['controller' => 'category', 'action' => 'delete', $item->id]) ?>"
                       class="button secondary">
                        <i class="fa fa-trash"></i>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
