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
    public function getMaterijal($id){
        $query = "SELECT * FROM materijali
                  WHERE id_predmet = $id";
         $res = $this->db->SqlQuery($query); 
        $r = array();
        while ($row = $this->db->FetchArray($res)) {
            $r[] = $row;
        }
        return $r;       
    }    
    public function upload($fajl, $predmetID, $autor, $vrsta){
        $tmp = explode(".", $fajl['name']);
        $tip = end($tmp);
        $naziv = basename($fajl['name']);
        $velicina = round($fajl['size']/1024);       
        if($fajl['error'] != 0){
            throw new Exception("Greska prilikom postavljanja fajla pod brojem: ". $fajl['error']);
        }
        $ext = array("pdf", "doc", "docx", "ppt","pptx", "zip");
        $mime_types = array("application/msword", "application/vnd.openxmlformats-officedocument.wordprocessingml.document", "application/pdf",
                    "application/vnd.openxmlformats-officedocument.presentationml.presentation","application/powerpoint", "application/zip");        
        if( 1048576 < $fajl['size']){
            throw new Exception("Nedozvoljena velicina fajla");
        }
        if(!(in_array($tip, $ext)) || !(in_array($fajl['type'], $mime_types))){
            throw new Exception("Pogresan tip fajla");
        }
        $pathname = $_SERVER['DOCUMENT_ROOT']. "diplomski/upload/$predmetID/$vrsta/";
        if(!is_dir($pathname)){
            mkdir($pathname, 0777, true);
        }
        move_uploaded_file($fajl['tmp_name'], $pathname.'/'.$naziv);
        $query = "INSERT INTO $vrsta (naziv, id_predmet, tip, velicina, datum, autor) 
                  VALUES ('$naziv', $predmetID, '$tip', $velicina, NOW(), '$autor')";
        $this->db->SqlQuery($query);
    }
    public function deleteMaterijal($id, $tabela){
        $query = "SELECT * FROM $tabela WHERE ID = $id";
        $result = $this->db->SqlQuery($query);
        $data = $this->db->FetchArray($result);
        if(!empty($data)){
        if(unlink($_SERVER['DOCUMENT_ROOT']. "diplomski/upload/".$data['id_predmet']."/materijali/".$data['naziv'])){
            $query = "DELETE * FROM materijali WHERE ID = $id";
            $this->db->SqlQuery($query);
        } else {
            throw new Exception ("Greška prilikom brisanja materijala");
        }
    } else {
        throw new Exception ("Fajl ne postoji");
    }
   }
    public function getIspitniZadaci($id){
       $query = "SELECT * FROM ispitni_zadaci
                  WHERE id_predmet = $id";
         $res = $this->db->SqlQuery($query); 
        $r = array();
        while ($row = $this->db->FetchArray($res)) {
            $r[] = $row;
        }
        return $r;       
    }
    public function getProjekti($id){
       $query = "SELECT * FROM projekti
                  WHERE id_predmet = $id";
         $res = $this->db->SqlQuery($query); 
        $r = array();
        while ($row = $this->db->FetchArray($res)) {
            $r[] = $row;
        }
        return $r;       
    }
    public function getPredmetByOdsek($odsek){
        $query = "SELECT ID, naziv, tip, godina, espb FROM predmeti WHERE odsek = '$odsek' SORT BY godina";
        $res = $this->db->SqlQuery($query); 
        $niz = array();
        while ($row = $this->db->FetchArray($res)) {
            $niz[] = $row;
        }
        return $niz;       
    }    
    
    
}

?>
