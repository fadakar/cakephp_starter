<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html lang="fa" dir="rtl" style="direction: rtl">
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('style.css') ?>

    <?= $this->fetch('meta') ?>

    <?= $this->Html->css('tailwind.prod') ?>
    <?= $this->Html->css('fa/css/all.min') ?>
    <?= $this->fetch('css') ?>
</head>
<body>


<div class="grid grid-rows-1 grid-cols-12 min-h-screen">

    <div class="col-span-2 shadow-[1px_0px_2px_3px_rgba(0,0,0,.2)] z-[999]">
        <div class="overflow-y-auto w-full h-full py-4 px-3 bg-gray-50 rounded dark:bg-gray-800">
            <?= $this->element('sidebar') ?>
        </div>
    </div>

    <div class=" col-span-10">
        <div class="flex flex-col">

            <div class="bg-gray-100 w-full text-right p-4">
                <?= $this->element('topbar') ?>
            </div>
            <div class="p-8">
                <div class="flex flex-col gap-2">
                    <div class="w-full">
                        <?= $this->Flash->render() ?>
                    </div>
                    <div class="w-full"><?= $this->fetch('content') ?></div>
                </div>

            </div>
        </div>
    </div>


</div>

<?= $this->Html->script('jquery') ?>
<?= $this->fetch('script') ?>
</body>
</html>
