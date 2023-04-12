<?php
require('../inc/app.php');
session_start();
if(!user_is_loged_in()){redirect('../login.php');}

if (!isset($_GET['term'])) {
    redirect('index.php');
    die();
}

$url_term = filter_input(INPUT_GET, 'term');
$term = Data::get_term_data($url_term);

if ($term === false) {
    view('not_found-view');
    die();
}

$model = [
    'id' => $term->id,
    'term' => $term->term,
    'definition' => $term->definition
];

view('admin/detail-view', $model);
