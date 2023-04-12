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

    private function query(string $sql, $sql_parms = []):array{
        $db= $this->connect();
        if(is_null($db)){return [];}
        $query = null;

        if(empty($sql_parms)){
            $query = $db->query($sql);
        }else{
            $query = $db->prepare($sql);
            $query->execute($sql_parms);
        }
       
        $data = $query->fetchAll(PDO::FETCH_CLASS, 'LexiconTerm');

        $query = null;
        $db = null;

        return $data;
    }

    private function execute(string $sql, $sql_params = []){
        $db= $this->connect();
        if(is_null($db)){return false;}

        $stmt = $db->prepare($sql);
        $stmt->execute($sql_params); 
        $stmt = null;
        $db = null;
    }

    /**
     * returns full lexicon as a php array of object
     * @return array of LexiconTerm obj
     */
    public function get_lexicon_data():array{
        return $this->query('SELECT * FROM terms');
    }

    public function seach_term($search){
        return $this->query(
            "SELECT * FROM terms WHERE term LIKE :search OR definition LIKE :search",
            [':search'=>'%'.$search.'%']
        );
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

    public function add_term(string $term, string $def){
        return $this->execute(
            'INSERT INTO terms (term, definition) VALUES (:term, :definition)',
            [
            ':term' => $term,
            ':definition' => $def
            ]
        );
    }

    public function update_term(string $orig_term, string $new_term, string $def){
        return $this->execute(
            'UPDATE terms SET term = :term, definition = :definition WHERE id = :id',
            [
            ':term' => $new_term,
            ':definition' => $def,
            ':id' => $orig_term
            ]
        );
    }

    public function delete_term($term){
        return $this->execute(
            'DELETE FROM terms WHERE id = :id',
            [
            ':id' => $term
            ]
        );
    }
}