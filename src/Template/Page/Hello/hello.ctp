salam <?= $name ?>

<?= $this->element('Button/green') ?>
<?= $this->element('Button/default') ?>
<br>
cell: <br>
<?= $this->cell('Inbox') ?>
<?php $this->start('menu') ?>
<li><a href="">item 1</a></li>
<li><a href="">item 2</a></li>
<?php $this->end() ?>
