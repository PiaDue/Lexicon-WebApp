<?php
require('../inc/app.php');

$model = [];
$model['title'] = 'Delete Term';

//delete page url got request for a term
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

    view('admin/delete-view', $model);
}

//recieved wheter or not a term should be get deleted
if (received_post_req()) {
    $term = sanitize_string($_POST['term']);
    
    if(!empty($term)){
        delete_term($term);
    }
    redirect('index.php');
}