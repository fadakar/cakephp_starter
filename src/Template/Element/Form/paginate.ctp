<div class="flex justify-between bg-gray-100 p-4">
    <div class=" text-right flex gap-2">

        <div class="paginate-button"><?= $this->Paginator->first('<<') ?></div>
        <div class="paginate-button"><?= $this->Paginator->prev('<') ?></div>
        <div class="paginate-button"><?= $this->Paginator->next('>') ?></div>
        <div class="paginate-button"><?= $this->Paginator->last('>>') ?></div>
    </div>

    <div>
        <?= $this->Paginator->counter(
            'صفحه {{page}} از {{pages}}'
        ) ?>
    </div>
</div>

<?php $this->append('script') ?>
<script>
    var filterFormId = '<?= $filterFormId ?? 'filter-form' ?>';
    $(document).ready(() => {
        $('.paginate-button a').click(function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();

            var url = $(this).attr('href');
            var filterForm = $('#' + filterFormId);
            $(filterForm).attr('action', url);
            $(filterForm).submit();
            return false;
        });
    });
</script>
<?php $this->end() ?>
