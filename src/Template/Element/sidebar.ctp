<ul class="space-y-2 mt-4">

    <li>
        <a href="#"
           class="menu-item">
            <i class="fas fa-rocket"></i>
            <span>داشبورد</span>
        </a>
    </li>

    <li>
        <a href="<?= $this->Url->build(['controller' => 'news', 'action' => 'index']) ?>"
           class="menu-item <?= $this->ActiveLink->is($this, ['controller' => 'news', 'action' => 'index']) ? 'active' : '' ?>">
            <i class="fas fa-radio"></i>
            <span>خبر ها</span>
        </a>
    </li>

    <li>
        <a href="<?= $this->Url->build(['controller' => 'category', 'action' => 'index']) ?>"
           class="menu-item <?= $this->ActiveLink->is($this, ['controller' => 'category', 'action' => 'index']) ? 'active' : '' ?>">
            <i class="fas fa-list-tree"></i>
            <span>دسته ها</span>
        </a>
    </li>

    <li>
        <a href="#"
           class="menu-item">
            <i class="fas fa-tags"></i>
            <span>برچسب ها</span>
        </a>
    </li>


</ul>
