<div class="grid grid-cols-12 ">
    <div class="col-span-10">
        <?= $this->Form->control($name ?? 'searchTerm', [
            'label' => false,
            'class' => 'rounded-none',
            'placeholder' => 'جستجو سریع ...'
        ]) ?>
    </div>
    <button class="col-span-2 button primary !rounded-none">
        <i class="far fa-search"></i>
        جستجو
    </button>
</div>
