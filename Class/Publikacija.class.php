<?php


class Publikacija {
    private $db;
    
    public function __construct($db) {
        $this->db = $db;
    }
    public function getKategorije(){
        $query = "SELECT * FROM sifrarnik_publikacija";
        $result = $this->db->SqlQuery($query);
        $kategorije = array();
        while ($row = $this->db->FetchArray($result)){
            $kategorije[] = $row;            
        }
        return $kategorije;
    }
    public function dodajPublikaciju($naslov, $kategorija, $casopis){
        $query = "INSERT INTO publikacije
                 (naslov, kategorija, casopis) VALUES ('$naslov', $kategorija, '$casopis')";
        if($this->db->SqlQuery($query)){
           return $this->db->GetLastInsertID(); 
        } else {
            throw new Exception("Greška prilikom dodavanja publikacije");  
        }
    }
    public function dodajAutore($publikacija, $autori){
        foreach ($autori as $autor){
            $query = "INSERT INTO autor_publikacija
                      (autor, id_publikacije) VALUES ('$autor', $publikacija)";
            $this->db->SqlQuery($query);
        }
    }
    public function dodajApstrakt($publikacija, $apstrakt){
         $tmp = explode(".", $apstrakt['name']);
        $tip = end($tmp);
        $naziv = basename($apstrakt['name']);
        $velicina = round($apstrakt['size']/1024);       
        if($apstrakt['error'] != 0){
            throw new Exception("Greska prilikom postavljanja fajla pod brojem: ". $apstrakt['error']);
        }
        $ext = array("pdf", "doc", "docx");
        $mime_types = array("application/msword", "application/vnd.openxmlformats-officedocument.wordprocessingml.document", "application/pdf");        
        if( 1048576 < $fajl['size']){
            throw new Exception("Nedozvoljena velicina fajla");
        }
        if(!(in_array($tip, $ext)) || !(in_array($apstrakt['type'], $mime_types))){
            throw new Exception("Pogresan tip fajla");
        }        
        $pathname = $_SERVER['DOCUMENT_ROOT']. "diplomski/upload/publikacije/apstrakt/";
        if(!is_dir($pathname)){
            mkdir($pathname, 0777, true);
        }
        move_uploaded_file($apstrakt['tmp_name'], $pathname.'/'.$naziv);
        $query = "UPDATE publikacije SET apstrakt = '$naziv' WHERE ID = $publikacija";
        $this->db->SqlQuery($query);
    }
    public function svePublikacije($redosled){
        $query = "SELECT * FROM publikacije as p INNER JOIN sifrarnik_publikacija as sf ON (p.kategorija = sf.ID)                  
                  ORDER BY $redosled";
        $res = $this->db->SqlQuery($query);
         $result = array();
        while ($row = $this->db->FetchArray($res)){
            $result[] = $row;            
        }
        return $result;
    }
    public function getAutor($id){
        $query = "SELECT autor FROM autor_publikacija WHERE id_publikacije = $id";
        $res = $this->db->SqlQuery($query);
        $result = array();
        while ($row = $this->db->FetchArray($res)){
            $result[] = $row['autor'];
        }
        $autori = implode(',', $result);
        return $autori;        
    }
    public function getPath(){
        return "http://localhost/diplomski/upload/publikacije/apstrakt/";
    }
            
}

?>
