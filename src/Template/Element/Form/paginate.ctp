<div class="flex justify-between bg-gray-100 p-4">
    <div class=" text-right flex gap-2">
        <?= $this->Paginator->first('<<') ?>
        <?= $this->Paginator->prev('<') ?>
        <?= $this->Paginator->next('>') ?>
        <?= $this->Paginator->last('>>') ?>
    </div>

    <div>
        <?= $this->Paginator->counter(
            'صفحه {{page}} از {{pages}}'
        ) ?>
    </div>
</div>
