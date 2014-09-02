<?php


class Zaposlen {
    private $db;
    public function __construct($database){
        $this->db = $database;        
    }
    public function dodaj($username, $password, $ime, $prezime, $adresa, $telefon, $email, $sajt, $bio, $zvanje, $datum, $kabinet, $prijem, $status){
        $this->provera_username($username);
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
    private function proveraUusername($username){
        $query = "SELECT ID FROM zaposleni WHERE userename = '$username'";
        $res =  $this->db->SqlQuery($query);
                if ($this->db->GetNumRows($res) > 0){
                    throw new Exception("Korisnik postoji pod ovim korisnickim imenom");
                }
    }
    public function prijava($username, $password){
        $query = "SELECT ID FROM zaposleni WHERE userename = '$username AND password = '". sha1($password)."'";
        $res =  $this->db->SqlQuery($query);
                if ($this->db->GetNumRows($res) < 1){
                    return false;
                }
                return true;
    }
    public function promenaLozinke($username, $old_password, $new_password){
        if($this->prijava($username, $old_password)){
            $query = "UPDATE zaposleni SET password = '". sha1($new_password). "'"
                    . "WHERE username = '$username'";
            if($this->db->SqlQuery($query)){
                return true;
        } else {
            throw new Exception("Greska prilikom promene lozinke");
        }
    } else {
        throw new Exception("Korisnik ne postoji");
    }
  }
}
