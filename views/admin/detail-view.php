<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
</head>

<body>
    <a href="index.php">← back</a>
    <h1><?= $model['term'] ?></h1>
    <p><?= $model['definition'] ?></p>
    <div>
        <a href="edit.php?key=<?=$model['id']?>">Edit</a>
        <a href="delete.php?key=<?=$model['id']?>">Delete</a>
    </div>
    
</body>

</html>