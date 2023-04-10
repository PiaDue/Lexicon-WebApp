<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
</head>

<body>
    <h1><?= $model['title'] ?></h1>

    <form action="" method="GET">
        <input type="text" name="search" id="search">
        <input type="submit" value="search">
    </form>

    <table>
        <thead>
            <th>Term</th>
            <th>Definition</th>
        </thead>
        <?php foreach ($model['data'] as $item) : ?>
            <tr>
                <td><a href="detail.php?term=<?= $item->term ?>">
                        <?= $item->term ?>
                    </a></td>
                <td><?= $item->definition ?></td>
            </tr>
        <?php endforeach; ?>

    </table>

</body>

</html>