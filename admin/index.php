<?php
require('../inc/app.php');
session_start();
if(!user_is_loged_in()){redirect('../login.php');}

$model = [];
$model['title'] = 'Your Lexikon';
$data = get_lexicon_data();
$model['data'] = $data;
$model['username'] = $_SESSION['username'];

view('admin/index-view', $model);