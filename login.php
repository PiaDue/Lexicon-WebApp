<?php
require('./inc/app.php');
session_start();

$model = [];

if (user_is_loged_in()) {
        redirect('admin/index.php');
}

if (received_post_req()) {
    $input_username = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $input_password = filter_input(INPUT_POST, 'password');

    if (autenticate_user($input_username, $input_password)) {
        $_SESSION['username'] = $input_username;
        redirect('admin/index.php');
    } else {
        $model['status'] = 'Login failed!';
    }
}  

view('login-view', $model);