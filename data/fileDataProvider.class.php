<?php
require_once('dataProvider.class.php');

class FileDataProvider extends DataProvider{

    /**
     * returns full lexicon as a string of json
     * @return bool|string
     */
    private function get_data()
    {
        $fname = $this->source;
        $json = '';
        if (!file_exists($fname)) {
            file_put_contents($fname, '');
        } else {
            $json = file_get_contents($fname);
        }
        return $json;
    }

    /**
     * returns full lexicon as a php array of object
     * @return mixed
     */
    public function get_lexicon_data():array{
        $json = $this->get_data();
        if($json==''){return [];}
        return json_decode($json);
    }
    
    public function set_lexicon_data($items){
        $fname = $this->source;
        $json = json_encode($items);
        file_put_contents($fname, $json);
    }


    /**
     * returns a certains term as an object
     * - properties: term, definition
     * @param string $term
     * @return object|false
     */
    public function get_term_data(string $term)
    {
        $lexicon_terms = $this->get_lexicon_data();
        foreach ($lexicon_terms as $item) {
            if ($item->term == $term) {
                return $item;
            }
        }
        return false;
    }

    public function seach_term($search)
    {
        $items = $this->get_lexicon_data();
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

    public function add_term(string $term, string $def){
        $items = $this->get_lexicon_data();
        $items[] = new LexiconTerm(null, $term, $def);
        $this->set_lexicon_data($items);
    }

    public function update_term(string $orig_term, string $new_term, string $def){
        $lexicon_terms = $this->get_lexicon_data();
        foreach ($lexicon_terms as $item) {
            if ($item->term == $orig_term) {
                $item->term = $new_term;
                $item->definition = $def;
                break;
            }
        }
        $this->set_lexicon_data($lexicon_terms);
    }

    public function delete_term(string $term){
        $lexicon_terms = $this->get_lexicon_data();
        for($i=0; $i<count($lexicon_terms); $i++){
            if($lexicon_terms[$i]->term == $term){
                unset($lexicon_terms[$i]);
                break;  
            }
        }

        $new_arr = array_values($lexicon_terms); 

        $this->set_lexicon_data($new_arr);
    }
}