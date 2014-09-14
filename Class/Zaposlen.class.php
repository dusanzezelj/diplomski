<?php
require_once 'Korisnik.class.php';

class Zaposlen extends Korisnik {     
    public function __construct($database){
        parent::__construct($database);
        $this->table = "zaposleni";
    }
    public function dodaj($username, $password, $ime, $prezime, $adresa, $telefon, $email, $sajt, $bio, $zvanje, $datum, $kabinet, $prijem, $status){
        $this->proveraUsername($username);
        $query = "INSERT INTO zaposleni (username, password, ime, prezime, adresa, telefon, email, web_sajt, biografija, zvanje, "
                . "datum_isteka_ugovora, kabinet, prijem_studenata, status)"
                . "VALUES ('$username', '".sha1($password)."', '$ime', '$prezime', '$adresa', '$telefon', '$email', "
                . "'$sajt', '$bio', '$zvanje', $datum, '$kabinet', '$prijem', $status)";
        if($this->db->SqlQuery($query)){
            return $this->db->GetLastInsertID();            
        } else {
            throw new Exception("Greska prilikom dodavanja zaposlenog u bazu");
        }
    }
    public function sviZaposleni(){
        $query = "SELECT * FROM zaposleni";
        $result = $this->SqlQuery($query);
        $zaposleni = array();
        while($row = $this->db->FetchArray($result)){
        $zaposleni[] = $row;
        }
        return $zaposleni;
    }
    public function getZaposlen($id){
        $query = "SELECT * FROM $this->table"
                . " WHERE ID = $id";
        $res = $this->db->SqlQuery($query);
        return $this->db->FetchArray($res);
    }
    public function editZaposlen($id, $adresa, $telefon, $biografija, $kabinet, $prijem){
        $query = "UPDATE zaposleni
                 SET adresa = '$adresa' AND telefon = '$telefon' AND biografija = '$biografija' AND kabinet = '$kabinet' AND prijem_studenata = '$prijem'
                 WHERE ID = $id";
        $this->db->SqlQuery($query);
    }
    
}
