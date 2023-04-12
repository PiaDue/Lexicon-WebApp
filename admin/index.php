<?php
require('../inc/app.php');
session_start();
if(!user_is_loged_in()){redirect('../login.php');}

$model = [];
$model['title'] = 'Your Lexicon';

if (isset($_GET['search']) && $_GET['search'] != '') {
    $data = Data::seach_term($_GET['search']); 
    $model['title'] = 'Seach Results for: ' . $_GET['search'];
} else {
    $data = Data::get_lexicon_data();
}

$model['data'] = $data;
$model['username'] = $_SESSION['username'];

view('admin/index-view', $model);