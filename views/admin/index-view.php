<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>lexicon</title>
    <link rel="stylesheet" href="../views/style/style.css">
</head>

<body>
    <a href="../../logout.php" class="admin-button">Logout</a>
    → account:<?=$model['username']?>
    
    <h1><?= $model['title'] ?></h1>

    <form action="" method="GET">
        <input type="text" name="search" id="search">
        <input type="submit" value="search">
    </form>
    
    <table>
        <thead>
            <th>Term</th>
            <th>Definition</th>
            <th></th>
            <th></th>
        </thead>
        <?php foreach ($model['data'] as $item) : ?>
            <tr>
                <td><a href="detail.php?term=<?=$item->id?>">
                        <?= $item->term ?>
                    </a></td>
                <td><?= $item->definition ?></td>
                <td><a href="edit.php?key=<?=$item->id?>" class="admin-button">Edit</a></td>
                <td><a href="delete.php?key=<?=$item->id?>" class="admin-button">Delete</a></td>
            </tr>
        <?php endforeach; ?>

    </table>

    <a href="create.php" class="admin-button">+ add term</a>

</body>

</html> 