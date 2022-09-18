<div style="max-width: 80%; margin: 0 auto;">
    <?=
    $this->Form->create($news, [
        'url' => [
            'controller' => 'news',
            'action' => 'add',
        ],
        'type' => 'post'
    ])
    ?>

    <?= $this->Form->control('title', ['error' => false]) ?>
    <span style="color: red;font-size: 12px;"><?= $this->Form->error('title') ?></span>

    <?= $this->Form->control('body') ?>

    <?= $this->Form->submit('Save', ['style' => 'background: #00aa00; width:100%']) ?>
    <?php $this->Form->end() ?>
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
