<?php
require('../inc/app.php');

$model = [];
$model['title'] = 'Your Lexikon';
$data = get_lexicon_data();
$model['data'] = $data;

view('admin/index-view', $model);