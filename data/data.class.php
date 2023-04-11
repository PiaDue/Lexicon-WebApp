<?php 
require_once('dataProvider.class.php');
class Data{
    static private $data_store;
    static public function initialize(DataProvider $data_provider){
        return self::$data_store = $data_provider;
    }

    static public function get_lexicon_data(){
        return self::$data_store->get_lexicon_data();
    }

    static public function set_lexicon_data($items){
        return self::$data_store->set_lexicon_data($items);
    }

    static public function get_term_data(string $term){
        return self::$data_store->get_term_data($term);
    }

    static public function seach_term($search){
        return self::$data_store->seach_term($search);
    }

    static public function add_term(string $term, string $def){
        return self::$data_store->add_term($term, $def);
    }

    static public function update_term(string $orig_term, string $new_term, string $def){
        return self::$data_store->update_term($orig_term, $new_term, $def);
    }

    static public function delete_term(string $term){
        return self::$data_store->delete_term($term);
    }
}