<?php
require('./inc/app.php');

if (!isset($_GET['term'])) {
    redirect('index.php');
    die();
}

$url_term = filter_input(INPUT_GET, 'term');
$term = get_term_data($url_term);

if ($term == false) {
    view('not_found-view');
    die();
}

$model = [
    'term' => $term->term,
    'definition' => $term->definition
];

view('detail-view', $model);
