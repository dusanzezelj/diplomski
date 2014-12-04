<?php
require_once 'Korisnik.class.php';

class Zaposlen extends Korisnik {     
    public function __construct($database){
        parent::__construct($database);
        $this->table = "zaposleni";
    }
    public function dodaj($username, $password, $ime, $prezime, $adresa, $telefon, $email, $sajt, $bio, $zvanje, $datum, $kabinet, $prijem, $status){
        $this->proveraUsername($username);
         $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO zaposleni (username, password, ime, prezime, adresa, telefon, email, web_sajt, biografija, zvanje, "
                . "datum_isteka_ugovora, kabinet, prijem_studenata, status)"
                . "VALUES ('$username', '".$hashed_password."', '$ime', '$prezime', '$adresa', '$telefon', '$email', "
                . "'$sajt', '$bio', '$zvanje', $datum, '$kabinet', '$prijem', $status)";
        if($this->db->SqlQuery($query)){
            return $this->db->GetLastInsertID();            
        } else {
            throw new Exception("Greska prilikom dodavanja zaposlenog u bazu");
        }
    }
    public function sviZaposleni(){
        $query = "SELECT * FROM zaposleni WHERE status = 1";
        $result = $this->db->SqlQuery($query);
        $zaposleni = array();
        while($row = $this->db->FetchArray($result)){
        $zaposleni[] = $row;
        }
        return $zaposleni;
    }
    public function getZaposlen($id){
        $query = "SELECT * FROM $this->table"
                . " WHERE ID = $id AND status = 1";
        $res = $this->db->SqlQuery($query);
        return $this->db->FetchArray($res);
    }
    public function editZaposlen($id, $adresa, $telefon, $biografija, $kabinet, $prijem){
        $query = "UPDATE zaposleni
                 SET adresa = '$adresa', telefon = '$telefon', biografija = '$biografija', kabinet = '$kabinet', prijem_studenata = '$prijem'
                 WHERE ID = $id";
        $this->db->SqlQuery($query);
    }
    public function adminAzuriranje($id, $ime, $prezime, $kime, $zvanje, $datum){
        $query = "UPDATE $this->table
                 SET ime = '$ime', prezime = '$prezime', username = '$kime', zvanje = '$zvanje', datum_isteka_ugovora = $datum
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
    public function addImage($id, $slika){
        $query = "SELECT slika FROM zaposleni WHERE ID = $id";
        $result = $this->db->SqlQuery($query);
        $pom = $this->db->FetchArray($result);
        if(!empty($pom[0])){
            unlink($_SERVER['DOCUMENT_ROOT'] . "diplomski/upload/images/". $pom[0]);           
        }
        $query = "UPDATE zaposleni SET slika = '$slika' WHERE ID = $id";
        $this->db->SqlQuery($query);
    }
    public function putanjaSlike(){
        return "http://localhost/diplomski/upload/images/";
        //return $_SERVER['DOCUMENT_ROOT'] . "diplomski/upload/images/";
    }
    public function obrisi($id){
        $query = "UPDATE zaposleni SET status = 0 WHERE ID = $id";
        if($this->db->SqlQuery($query)){
            $query = "DELETE FROM angazovanja WHERE id_nastavnik = $id";
            $this->db->SqlQuery($query);
        } else {
            throw new Exception("Greška prilikom brisanja zaposlenog");
        }
    }
    
}
