<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>lexicon</title>
    <link rel="stylesheet" href="../views/style/style.css">
</head>

<body>
    <a href="index.php">← cancel</a>
    <h1><?= $model['title'] ?></h1>
    
    <h3>Are you sure you want to delete this term?</h3>
    <b><?=$model['term']?></b>
    <p><?=$model['definition']?></p>

    <form action="" method="POST">
        <input type="hidden" name="term" value="<?=$model['id']?>">
        <input type="submit" value="delete">
    </form>

</body>

</html>