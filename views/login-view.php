<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>lexicon</title>
    <link rel="stylesheet" href="./views//style/style.css">
</head>

<body>
    <a href="index.php">← back</a>
    <h1>Login</h1>
    <form action="" method="POST" class="login-form">
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" name="email" id="email">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password">
        </div>
        <input type="submit" name="login" value="login">
    </form>
    <div class="message" style="color: red;">
        <?php
        if (isset($model['status'])) {
            echo $model['status'];
        }
        ?>
    </div>
</body>

</html>