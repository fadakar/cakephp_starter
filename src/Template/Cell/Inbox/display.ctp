inbox cell template
<table>
    <thead>
    <th>id</th>
    <th>title</th>
    <th>body</th>
    </thead>
    <tbody>
    <?php foreach ($newsList as $news) : ?>
        <tr>
            <td><?= $news->id ?></td>
            <td><?= $news->title ?></td>
            <td><?= $news->body ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
