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


<?= $this->cell('NewsList') ?>


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
