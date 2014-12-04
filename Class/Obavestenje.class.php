<?php


class Obavestenje {
     private $db;
    
    public function __construct($db) {
        $this->db = $db;
    }
    public function addObavestenje($kategorija, $sadrzaj){
        $query = "INSERT INTO obavestenja (kategorija, sadrzaj, datum)
                  VALUES ($kategorija, '$sadrzaj', NOW())";
        if(!$this->db->SqlQuery($query)){
            throw new Exception("Greška prilikom dodavanja obaveštenja");
        }        
    }
    public function getKategorije(){
        $query = "SELECT * FROM kategorije_obavestenja";
        $result = $this->db->SqlQuery($query);
        $kat = array();
        while($row = $this->db->FetchArray($result)){
        $kat[] = $row;
        }
        return $kat;
    }
    public function addKategorija($naziv){
        $query = "SELECT * FROM kategorije_obavestenja WHERE naziv = '$naziv'";
        $res = $this->db->SqlQuery($query);
        if ($this->db->GetNumRows($res) < 1) {
            $query = "INSERT INTO kategorije_obavestenja (naziv) VALUES ('$naziv')";
            $this->db->SqlQuery($query);
            return true;
        }
        throw new Exception("Kategorija sa ovim nazivom već postoji");
           
    }

    public function getNovaObavestenja(){
        $query = "SELECT * FROM obavestenja as o INNER JOIN kategorije_obavestenja as k
                  ON (o.kategorija = k.id) WHERE o.datum >= DATE_SUB(CURDATE(), INTERVAL 3 MONTH)
                  ORDER BY o.datum DESC";
        $result = $this->db->SqlQuery($query);
        $obavestenja = array();
        while($row = $this->db->FetchArray($result)){
        $obavestenja[] = $row;
        }
        return $obavestenja;
    }
    public function getSvaObavestenja(){
        $query = "SELECT * FROM obavestenja as o INNER JOIN kategorije_obavestenja as k
                  ON (o.kategorija = k.id)
                  ORDER BY o.datum DESC";
        $result = $this->db->SqlQuery($query);
        $obavestenja = array();
        while($row = $this->db->FetchArray($result)){
        $obavestenja[] = $row;
        }
        return $obavestenja;
    }
    
}

?>
