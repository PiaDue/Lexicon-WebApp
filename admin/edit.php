<?php
require('../inc/app.php');
session_start();
if(!user_is_loged_in()){redirect('../login.php');}

$model = [];
$model['title'] = 'Edit Term';

//edit page url got request
if(received_get_req()){
    $key = sanitize_string($_GET['key']);
    if(empty($key)){
        view('not_found-view');
        die();
    }

    $term = get_term_data($key);

    if ($term==false){
        view('not_found-view');
        die();
    }

    $model['term'] = $term->term;
    $model['definition'] = $term->definition;

    view('admin/edit-view', $model);
}

//recieved new term data from form
if (received_post_req()) {
    $orig_term = sanitize_string($_POST['orig-term']);
    $term = sanitize_string($_POST['term']);
    $def = sanitize_string($_POST['def']);

    if(empty($term) || empty($def) || empty($orig_term)){
        echo 'Update of term failed!';
    } else{
        update_term($orig_term, $term, $def);
        redirect('index.php');
    }
}