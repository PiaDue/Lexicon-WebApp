<?php
require('./inc/app.php');

$model = [];
$model['title'] = 'Lexicon';

if (isset($_GET['search']) && $_GET['search'] != '') {
    $data = Data::seach_term($_GET['search']); 
    $model['title'] = 'Seach Results for: ' . $_GET['search'];
} else {
    $data = Data::get_lexicon_data();
}

$model['data'] = $data;

view('index-view', $model);
