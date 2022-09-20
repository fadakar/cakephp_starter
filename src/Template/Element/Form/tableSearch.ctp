<form id="<?= $id ?? 'filter-form' ?>"
      method="post" action="<?= $this->Url->build(['controller' => $controller, 'action' => $action]) ?>">
    <div class="grid grid-cols-12 ">
        <div class="col-span-10">
            <?= $this->Form->control($name ?? 'searchTerm', [
                'value' => $this->getRequest()->getQuery($name ?? 'searchTerm'),
                'id' => $name ?? 'searchTerm' . '-input',
                'label' => false,
                'class' => 'rounded-none',
                'placeholder' => 'جستجو سریع ...'
            ]) ?>
        </div>

        <button type="submit" id="<?= $name ?? 'searchTerm' ?>-submit-btn"
                class="col-span-1 button primary !rounded-none">
            <i class="far fa-search"></i>
            جستجو
        </button>
        <button id="<?= $name ?? 'searchTerm' ?>-reset-btn" class="col-span-1 button secondary !rounded-none">
            <i class="far fa-xmark-to-slot"></i>
            پاک کن
        </button>
    </div>
</form>


<?php $this->append('script') ?>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        var btnSubmit = document.getElementById('<?= $name ?? 'searchTerm' ?>-submit-btn');
        var btnReset = document.getElementById('<?= $name ?? 'searchTerm' ?>-reset-btn');
        var input = document.getElementById('<?= $name ?? 'searchTerm' ?>-input');
        btnReset.onclick = function () {
            input.value = '';
            btnSubmit.click();
        };
    });
</script>
<?php $this->end() ?>
