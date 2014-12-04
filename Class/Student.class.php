<?php
require_once 'Korisnik.class.php';

class Student extends Korisnik {
    
    public function __construct($database) {
        parent::__construct($database);
        $this->table = "studenti";
    }
    public function dodaj($username, $password, $indeks, $studije, $ime, $prezime, $adresa, $telefon, $status){
        $this->proveraUsername($username);
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO $this->table
                 (username, password, indeks, tip_studija, ime, prezime, adresa, telefon, status) 
                VALUES ('$username', '".$hashed_password."', '$indeks', '$studije', '$ime', '$prezime', '$adresa', '$telefon', $status)";    
     if($this->db->SqlQuery($query)){
            return $this->db->GetLastInsertID();            
        } else {
            throw new Exception("Greska prilikom dodavanja studenta u bazu");
        }
    }
    public function sviStudenti(){
        $query = "SELECT * FROM $this->table WHERE status = 1";
        $result = $this->db->SqlQuery($query);
        $studenti = array();
        while($row = $this->db->FetchArray($result)){
        $studenti[] = $row;
        }
        return $studenti;
    }
     public function obrisi($id){
        $query = "UPDATE studenti SET status = 0 WHERE ID = $id";
        if(!$this->db->SqlQuery($query)){
           throw new Exception("Greška prilikom brisanja studenta");
        } 
    }
    public function getStudent($id){
        $query = "SELECT * FROM $this->table"
                . " WHERE ID = $id AND status = 1";
        $res = $this->db->SqlQuery($query);
        return $this->db->FetchArray($res);
    }
    public function adminAzuriranje($id, $ime, $prezime, $kime, $indeks, $tip, $adresa, $telefon) {
        $query = "UPDATE $this->table
                 SET ime = '$ime', prezime = '$prezime', username = '$kime', indeks = '$indeks', tip_studija = '$tip', 
                 adresa = '$adresa', telefon = '$telefon'
                 WHERE ID = $id";
        $this->db->SqlQuery($query);
    }
}

?>
