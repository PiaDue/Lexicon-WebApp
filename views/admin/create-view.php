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

    <form action="" method="POST">
        <div class="form-group">
            <label for="term">Term</label>
            <input type="text" name="term" id="term">
        </div>
        <div class="form-group">
            <label for="def">Definition</label>
            <textarea name="def" id="def"></textarea>
        </div>
        <input type="submit" value="add">
    </form>

</body>

</html> 