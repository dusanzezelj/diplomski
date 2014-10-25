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
        $result = $this->db->SqlQuery($query);
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
    public function addAngazovanje($zaposleniID, $predmetID, $grupa){
        $query = "SELECT * FROM angazovanja "
                . "WHERE id_predmet = $predmetID AND id_nastavnik = $zaposleniID "
                . "AND grupa = $grupa";
        $res =  $this->db->SqlQuery($query);
                if ($this->db->GetNumRows($res) > 0){
                    throw new Exception("Zaposlen je već angažovan na ovom predmetu");
                }
        $query = "INSERT INTO angazovanja "
                . "(id_predmet, id_nastavnik, grupa) VALUES ($predmetID, $zaposleniID, $grupa)";
        if(!$this->db->SqlQuery($query)){
            throw new Exception("Greška prilikom dodavanja angažovanja");
        }
    }
    
}
