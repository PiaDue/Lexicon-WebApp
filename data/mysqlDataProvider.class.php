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
     * - properties: id, term, definition
     * @param string $term
     * @return object|false
     */
    public function get_term_data($term_id){   
        $db= $this->connect();
        if(is_null($db)){return null;}

        $sql = "SELECT * FROM terms WHERE id= :id";
        $stmt = $db->prepare($sql);
        $stmt->execute([':id'=>$term_id]);
        $data = $stmt->fetchAll(PDO::FETCH_CLASS, 'LexiconTerm');

        $stmt = null;
        $db = null;

        if(empty($data)){return null;}
        return $data[0];
    }

    public function seach_term($search){
         
    }

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

    public function update_term(string $orig_term, string $new_term, string $def){
        $db= $this->connect();
        if(is_null($db)){return false;}

        $sql = "UPDATE terms SET term = :term, definition = :definition WHERE id = :id";
        $stmt = $db->prepare($sql);
        $stmt->execute([
            ':term' => $new_term,
            ':definition' => $def,
            ':id' => $orig_term
        ]);
        $stmt = null;
        $db = null;
        return true;
    }

    public function delete_term($term){
        $db= $this->connect();
        if(is_null($db)){return false;}

        $sql = "DELETE FROM terms WHERE id = :id";
        $stmt = $db->prepare($sql);
        $stmt->execute([
            ':id' => $term
        ]);
        $stmt = null;
        $db = null;
        return true;
    }
}