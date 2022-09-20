<?php $this->start('title') ?>
<div class="flex items-center gap-4">
    <i class="text-gray-600 fa fa-radio"></i>
    <div>لیست خبر ها</div>
</div>
<?php $this->end() ?>

<?php $this->start('topbar-actions') ?>
<a class="button green flex gap-2 justify-between items-center"
   href="<?= $this->Url->build(['controller' => 'news', 'action' => 'add']) ?>">
    <i class="fa fa-plus"></i>
    <div> خبر جدید</div>
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
                        <?= $this->Paginator->sort('id', '#') ?>
                    </th>
                    <th scope="col" class="py-3 px-6">
                        <?= $this->Paginator->sort('category.title', 'دسته') ?>
                    </th>
                    <th scope="col" class="py-3 px-6">
                        <?= $this->Paginator->sort('title', 'عنوان') ?>
                    </th>
                    <th scope="col" class="py-3 px-6">
                        محتوا
                    </th>
                    <th scope="col" class="py-3 px-6">
                    </th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($newsList as $item) : ?>
                    <tr class="bg-white border-b text-right dark:bg-gray-800 dark:border-gray-700">
                        <th class="py-4 px-6">
                            <?= $item->id ?>
                        </th>
                        <td class="py-4 px-6">
                            <?= isset($item->category) ? $item->category->title : '---' ?>
                        </td>
                        <td class="py-4 px-6">
                            <?= substr($item->title, 0, 70) ?>
                        </td>
                        <td class="py-4 px-6">
                            <?= substr($item->body, 0, 70) ?>
                        </td>
                        <td class="flex gap-2 items-center justify-end px-4 py-2">
                            <a href="<?= $this->Url->build([
                                'controller' => 'News', 'action' => 'view',
                                $item->id, $newsTable->slug($item->title)]) ?>"
                               class="button secondary">
                                <i class="fa fa-eye"></i>
                            </a>

                            <a href="<?= $this->Url->build(['controller' => 'News', 'action' => 'edit', $item->id]) ?>"
                               class="button secondary">
                                <i class="fa fa-edit"></i>
                            </a>

                            <a href="<?= $this->Url->build(['controller' => 'News', 'action' => 'delete', $item->id]) ?>"
                               class="button secondary">
                                <i class="fa fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <?= $this->element('Form/paginate') ?>


    </div>
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
