<table>
    <thead>
    <th>id</th>
    <th>category</th>
    <th>title</th>
    <th>body</th>
    <th></th>
    </thead>
    <tbody>
    <?php foreach ($newsList as $item) : ?>
        <tr>
            <td><?= $item->id ?></td>
            <td><?= isset($item->category) ? $item->category->title : '---' ?></td>
            <td><?= $item->title ?></td>
            <td><?= $item->body ?></td>
            <td>
                <?=
                $this->Html->link(
                    'Show',
                    ['controller' => 'news', 'action' => 'view', $item->id, $newsTable->slug($item->title)],
                    ['style' => 'color:blue']
                )
                ?>

                <?=
                $this->Html->link(
                    'Edit',
                    ['controller' => 'news', 'action' => 'edit', $item->id]
                )
                ?>
                &nbsp;
                <?=
                $this->Html->link(
                    'Delete',
                    ['controller' => 'news', 'action' => 'delete', $item->id],
                    [
                        'confirm' => 'Are you sure to delete this item ?',
                        'style' => 'color:red'
                    ]
                )
                ?>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
