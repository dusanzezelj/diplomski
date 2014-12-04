<?php
require_once 'Korisnik.class.php';

class Admin extends Korisnik {
    public function __construct($database) {
        parent::__construct($database);
        $this->table = "administrator";
    }
}

?>
