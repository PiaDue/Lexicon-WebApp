<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Page Title</title>
</head>

<body>
    <?php
    require_once('./inc/config.php');
    require_once('./inc/functions.php');
    session_start();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $input_username = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $input_password = filter_input(INPUT_POST, 'password');

        if (user_is_loged_in()) {
            redirect('admin.php');
        }

        if (autenticate_user($input_username, $input_password)) {
            $_SESSION['username'] = $input_username;
            header('Location: admin.php');
            die();
        } else {
            $status = 'login data is false!';
        }
    }
    ?>

    <h1>PHP BASICS</h1>
    <form action="" method="POST">
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" name="email" id="email">
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" name="password" id="password">
        </div>
        <input type="submit" name="login" value="login">
    </form>
    <div class="message">
        <?php
        if (isset($status)) {
            echo $status;
        }
        ?>
    </div>
</body>

</html>