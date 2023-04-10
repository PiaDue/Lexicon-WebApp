<?php
require_once('./inc/functions.php');
session_start();

if (!user_is_loged_in()) {
    redirect('login.php');
}

echo $_SESSION['username'];
