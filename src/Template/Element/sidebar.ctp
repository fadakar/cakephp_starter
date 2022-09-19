<ul class="space-y-2">

    <li>
        <a href="#"
           class="flex items-center justify-end gap-4 p-4 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
            <span class="text-gray-600">داشبورد</span>
            <i class="text-gray-500 text-2xl fas fa-rocket"></i>
        </a>
    </li>

    <li>
        <a href="<?= $this->Url->build(['controller' => 'news', 'action' => 'index']) ?>"
           class="flex items-center justify-end gap-4 p-4 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 bg-blue-100">
            <span class="text-blue-600">خبر ها</span>
            <i class="text-blue-500 text-2xl fas fa-radio"></i>
        </a>
    </li>

    <li>
        <a href="<?= $this->Url->build(['controller' => 'category', 'action' => 'index']) ?>"
           class="flex items-center justify-end gap-4 p-4 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
            <span class="text-gray-600">دسته ها</span>
            <i class="text-gray-500 text-2xl fas fa-list-tree"></i>
        </a>
    </li>

    <li>
        <a href="#"
           class="flex items-center justify-end gap-4 p-4 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
            <span class="text-gray-600">برچسب ها</span>
            <i class="text-gray-500 text-2xl fas fa-tags"></i>
        </a>
    </li>


</ul>
