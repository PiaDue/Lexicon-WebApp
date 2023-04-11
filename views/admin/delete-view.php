<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
</head>

<body>
    <h1><?= $model['title'] ?></h1>
    
    <p>Are you sure you want to delete this term?</p>
    <p>
        <b><?=$model['term']?></b>
        <?=$model['definition']?>
    </p>

    <form action="" method="POST">
        <input type="hidden" name="term" value="<?=$model['term']?>">
        <input type="submit" value="delete">
    </form>
    <a href="index.php">Cancel</a>

</body>

</html> 