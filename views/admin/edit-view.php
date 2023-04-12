<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
</head>

<body>
    <h1><?= $model['title'] ?></h1>

    <form action="" method="POST">
        <input type="hidden" name="orig-term" value="<?=$model['id']?>">
        <div class="form-group">
            <label for="term">Term:</label>
            <input type="text" name="term" id="term" value="<?=$model['term']?>">
        </div>
        <div class="form-group">
            <label for="def">Definition:</label>
            <textarea name="def" id="def">
                <?=$model['definition']?>
            </textarea>
        </div>
        <input type="submit" value="edit">
    </form>

</body>

</html> 