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
        <div class="grid grid-cols-12 ">
            <div class="col-span-10">
                <?= $this->Form->control('searchTerm', ['label' => false, 'class' => 'rounded-none', 'placeholder' => 'جستجو سریع ...']) ?>
            </div>
            <button class="col-span-2 button primary !rounded-none">
                <i class="far fa-search"></i>
                جستجو
            </button>
        </div>
        <?= $this->cell('NewsList') ?>
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
