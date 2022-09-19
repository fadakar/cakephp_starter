<?php $this->start('title') ?>
<div class="flex items-center gap-4">
    <div>لیست خبر ها</div>
    <i class="text-gray-600 fa fa-radio"></i>
</div>
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
