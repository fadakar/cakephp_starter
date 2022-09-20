<!DOCTYPE html>
<html lang="fa" dir="rtl" style="direction: rtl">
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('style.css') ?>

    <?= $this->fetch('meta') ?>

    <?= $this->Html->css('tailwind.prod') ?>
    <?= $this->Html->css('fa/css/all.min') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
<?= $this->fetch('content') ?>
</body>
</html>
