<div class="flex justify-between">
    <div class="flex gap-4 items-center">
        <div>
            <?= $this->fetch('title') ?>
        </div>
        <div>
            <?= $this->fetch('topbar-actions') ?>
        </div>
    </div>

    <div>
        <a class="button secondary" href="<?= $this->Url->build(['controller' => 'auth', 'action' => 'logout']) ?>">
            <i class="fa fa-arrow-right-from-bracket"></i>
            خروج
        </a>
    </div>
</div>
