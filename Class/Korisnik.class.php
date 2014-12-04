<?php


class Korisnik {
    protected $db;
    protected $table = null;
     public function __construct($database){
        $this->db = $database;        
    }
     protected function proveraUsername($username){
        $query = "SELECT ID FROM $this->table WHERE username = '$username'";
        $res =  $this->db->SqlQuery($query);
                if ($this->db->GetNumRows($res) > 0){
                    throw new Exception("Korisnik postoji pod ovim korisnickim imenom");
                }
    }
    public function postoji($username, $password) {
        $query = "SELECT ID, password FROM $this->table WHERE username = '$username'";
        $res = $this->db->SqlQuery($query);
        if ($this->db->GetNumRows($res) < 1) {
            return false;
        }
        $row = $this->db->FetchArray($res);
        if (password_verify($password, $row['password'])) {
            return true;
        } else {
            return false;
        }
    }
    public function promenaLozinke($username, $old_password, $new_password){
        if($this->postoji($username, $old_password)){
            $password = password_hash($new_password, PASSWORD_DEFAULT);
            $query = "UPDATE $this->table SET password = '". $password. "'"
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
  public function prijava($username, $password){
      if($this->postoji($username, $password)){
          $query = "SELECT * FROM $this->table WHERE username = '$username'";
          $res =  $this->db->SqlQuery($query);
          return $this->db->FetchArray($res);
      } else {
           throw new Exception("Pogrešno ste uneli korisničko ime ili lozinku!");
      }
  }
}

?>
