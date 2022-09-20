<?php $this->start('title') ?>
<div class="flex items-center gap-4">
    <i class="text-gray-600 fa fa-rocket"></i>
    <div>داشبورد</div>
</div>
<?php $this->end() ?>

<h2>خوش آمدید
    <?= $this->Identity->get('nickname') ?>
</h2>
