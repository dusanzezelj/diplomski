<?php


class Predmet {
    private $db;
    
    public function __construct($db) {
        $this->db = $db;
    }
    public function getPredmetByProf($profesorID){
        $query = "SELECT p.ID, p.naziv, p.sifra_predmeta FROM angazovanja as a
                  INNER JOIN predmeti as p ON (a.id_predmet = p.ID)
                  WHERE a.id_nastavnik = $profesorID";
        $res = $this->db->SqlQuery($query); 
        $r = array();
        while ($row = $this->db->FetchArray($res)) {
            $r[] = $row;
        }
        return $r;
    }
    public function getPredmetByID($id){        
        $query = "SELECT * FROM predmeti
                  WHERE ID = $id";
        $res = $this->db->SqlQuery($query);
        return $this->db->FetchArray($res);
    }
}

?>
