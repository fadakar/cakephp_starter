<?php $this->start('title') ?>
<div class="flex items-center gap-4">
    <i class="text-gray-600 fa fa-list-tree"></i>
    <div>لیست دسته ها</div>
</div>
<?php $this->end() ?>

<?php $this->start('topbar-actions') ?>
<a class="button green flex gap-2 justify-between items-center"
   href="<?= $this->Url->build(['controller' => 'category', 'action' => 'add']) ?>">
    <i class="fa fa-plus"></i>
    <div> دسته جدید</div>
</a>
<?php $this->end() ?>


<div class="w-full card blue">
    <div class="flex flex-col mr-[-2px]">
        <form method="get" action="<?= $this->Url->build(['controller' => 'news', 'action' => 'index']) ?>">
            <?= $this->element('Form/tableSearch') ?>
        </form>

        <div class="overflow-x-auto relative">
            <table class="w-full text-sm  text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr class="text-right">
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
                    <tr class="bg-white border-b text-right dark:bg-gray-800 dark:border-gray-700">
                        <th class="py-4 px-6">
                            <?= $this->Number->format($item->id) ?>
                        </th>
                        <td class="py-4 px-6">
                            <?= $item->has('parent_category') ? $this->Html->link($item->parent_category->title, ['controller' => 'Category', 'action' => 'view', $item->parent_category->id]) : '' ?>
                        </td>
                        <td class="py-4 px-6">
                            <?= h($item->title) ?>
                        </td>
                        <td class="flex gap-2 items-center justify-end px-4 py-2">
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

        </div>

        <div class="bg-gray-100 p-4 text-right flex gap-2">
            <?= $this->Paginator->first('<<') ?>
            <?= $this->Paginator->prev('<') ?>
            <?= $this->Paginator->next('>') ?>
            <?= $this->Paginator->last('>>') ?>
        </div>

    </div>
</div>


