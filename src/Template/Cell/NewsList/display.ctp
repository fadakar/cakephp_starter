<div class="overflow-x-auto relative">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            <th scope="col" class="py-3 px-6">
                #
            </th>
            <th scope="col" class="py-3 px-6">
                دسته
            </th>
            <th scope="col" class="py-3 px-6">
                عنوان
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
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
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
                <td>
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
