<?php
/**
 * returns full lexicon as a string of json
 * @return bool|string
 */
function get_data()
{
    $fname = CONFIG['data_file'];
    $json = '';
    if (!file_exists($fname)) {
        file_put_contents($fname, '');
    } else {
        $json = file_get_contents($fname);
    }
    return $json;
}

/**
 * returns full lexicon as a php object
 * @return mixed
 */
function get_lexicon_data()
{
    $json = get_data();
    return json_decode($json);
}

function get_term_data($term)
{
    $lexicon_terms = get_lexicon_data();
    foreach ($lexicon_terms as $item) {
        if ($item->term == $term) {
            return $item;
        }
    }
    return false;
}

function seach_term($search)
{
    $items = get_lexicon_data();
    $found = array_filter($items, function ($item) use ($search) {
        if (
            strpos($item->term, $search) !== false ||
            strpos($item->definition, $search) !== false
        ) {
            return $item;
        }
    });
    return $found;
}

function set_lexicon_data($items){
    $fname = CONFIG['data_file'];
    $json = json_encode($items);
    file_put_contents($fname, $json);
}

function add_term(string $term, string $def){
    $items = get_lexicon_data();

    $obj = (object)[
        'term'=>$term,
        'definition'=>$def
    ];
    $items[] = $obj;

    set_lexicon_data($items);
}

