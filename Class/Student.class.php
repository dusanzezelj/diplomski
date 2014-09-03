<?php
require_once 'Korisnik.class.php';

class Student extends Korisnik {
    
    public function __construct($database) {
        parent::__construct($database);
        $this->table = "studenti";
    }
    public function dodaj($username, $password, $indeks, $studije, $ime, $prezime, $adresa, $telefon, $status){
        $this->proveraUsername($username);
        $query = "INSERT INTO $this->table
                 (username, password, indeks, tip_studija, ime, prezime, adresa, telefon, status) 
                VALUES ('$username', '".sha1($password)."', '$indeks', '$studije', '$ime', '$prezime', '$adresa', '$telefon', $status)";    
     if($this->db->SqlQuery($query)){
            return $this->db->GetLastInsertID();            
        } else {
            throw new Exception("Greska prilikom dodavanja studenta u bazu");
        }
    }          
}

?>
