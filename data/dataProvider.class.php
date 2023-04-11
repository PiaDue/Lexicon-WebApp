<?php
require_once('lexiconTerm.class.php');

abstract class DataProvider{

    public $source;

    function __construct($source){
        $this->source = $source;
    }

    /**
     * returns full lexicon as a php array of object
     * @return mixed
     */
    abstract public function get_lexicon_data();

    /**
     * returns a certains term as an object
     * - properties: term, definition
     * @param string $term
     * @return object|false
     */
    abstract public function get_term_data(string $term);

    abstract public function seach_term($search);

    abstract public function add_term(string $term, string $def);

    abstract public function update_term(string $orig_term, string $new_term, string $def);

    abstract public function delete_term(string $term);
}