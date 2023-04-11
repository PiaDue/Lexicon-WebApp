<?php
require_once('dataProvider.class.php');

class MysqlDataProvider extends DataProvider{

    private function connect(){
        try{
            return new PDO($this->source, CONFIG['db_user'], CONFIG['db_password']);
        }catch(PDOException $e){
            return null; 
        }
    }

    /**
     * returns full lexicon as a php array of object
     * @return array of LexiconTerm obj
     */
    public function get_lexicon_data():array{
        $db= $this->connect();
        if(is_null($db)){return [];}

        $sql = "SELECT * FROM terms";
        $query = $db->query($sql);
        $data = $query->fetchAll(PDO::FETCH_CLASS, 'LexiconTerm');

        $query = null;
        $db = null;

        return $data;
    }

    /**
     * returns a certains term as an object
     * - properties: term, definition
     * @param string $term
     * @return object|false
     */
    public function get_term_data(string $term){   
    }

    public function seach_term($search){}

    public function add_term(string $term, string $def){
        $db= $this->connect();
        if(is_null($db)){return false;}

        $sql = "INSERT INTO terms (term, definition) VALUES (:term, :definition);";
        $stmt = $db->prepare($sql);
        $stmt->execute([
            ':term' => $term,
            ':definition' => $def
        ]);
        $stmt = null;
        $db = null;
        return true;
    }

    public function update_term(string $orig_term, string $new_term, string $def){}

    public function delete_term(string $term){}
}