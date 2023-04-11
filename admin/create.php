<?php
require('../inc/app.php');
session_start();
if(!user_is_loged_in()){redirect('../login.php');}



$model = [];
$model['title'] = 'New Term';

if (received_post_req()) {
    $term = sanitize_string($_POST['term']);
    $def = sanitize_string($_POST['def']);

    if(empty($term) || empty($def)){
        echo 'Creation of new term failed!';
    } else{
        add_term($term, $def);
        redirect('index.php');
    }
}

view('admin/create-view', $model);