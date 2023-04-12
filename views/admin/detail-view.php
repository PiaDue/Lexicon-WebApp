<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>lexicon</title>
    <link rel="stylesheet" href="../views/style/style.css">
</head>

<body>
    <a href="index.php">← back</a>
    <h1>Term Detail</h1>
    <b><?= $model['term'] ?></b>
    <p><?= $model['definition'] ?></p>
    <div>
        <a href="edit.php?key=<?=$model['id']?>" class="admin-button">Edit</a>
        <a href="delete.php?key=<?=$model['id']?>" class="admin-button">Delete</a>
    </div>
    
</body>

</html>