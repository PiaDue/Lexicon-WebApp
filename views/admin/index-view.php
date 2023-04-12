<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
</head>

<body>
    <a href="../../logout.php">Logout</a>
    User: <?=$model['username']?>
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
                <td><a href="detail.php?term=<?=$item->id?>">
                        <?= $item->term ?>
                    </a></td>
                <td><?= $item->definition ?></td>
                <td><a href="edit.php?key=<?=$item->id?>">Edit</a></td>
                <td><a href="delete.php?key=<?=$item->id?>">Delete</a></td>
            </tr>
        <?php endforeach; ?>

    </table>

    <a href="create.php">+ add term</a>

</body>

</html> 