<?php
require_once('lexiconTerm.class.php');

abstract class DataProvider{

    public $source;

    function __construct($source){
        $this->source = $source;
    }

    abstract public function get_lexicon_data():array;

    abstract public function get_term_data($term);

    abstract public function seach_term($search);

    abstract public function add_term(string $term, string $def);

    abstract public function update_term(string $orig_term, string $new_term, string $def);

    abstract public function delete_term($term);
}