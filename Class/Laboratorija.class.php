<?php
class Laboratorija {

    private $db;

    public function __construct($db) {
        $this->db = $db;
    }
    public function postojeVezbe($predmetID){
        $query = "SELECT * from lab_vezbe WHERE id_predmet = $predmetID";
         $res =  $this->db->SqlQuery($query);
                if ($this->db->GetNumRows($res) < 1){
                    return 0;
                }
          $row = $this->db->FetchArray($res);
          return $row['ID'];
    }
            

    public function dodajLaboratoriju($predmetID, $nacin, $broj_vezbi){
        if ($this->postojeVezbe($predmetID) == 0) {
            $query = "INSERT INTO lab_vezbe (id_predmet, nacin_rada, broj)
                  VALUES ($predmetID, '$nacin', $broj_vezbi)";
            if (!$this->db->SqlQuery($query)) {
                throw new Exception("Greska prilikom dodavanja informacija o laboratorijskoj vežbi");
            }          
        } else {
            $query = "UPDATE lab_vezbe 
                     SET nacin_rada = '$nacin', broj = $broj_vezbi WHERE id_predmet = $predmetID";
            if (!$this->db->SqlQuery($query)) {
                throw new Exception("Greska prilikom ažuriranja informacija o laboratorijskoj vežbi");
            }
        }
         return true;
    }
    public function upload($fajl, $naziv, $predmetID, $labID, $autor){
        $tmp = explode(".", $fajl['name']);
        $tip = end($tmp);
        $naziv_mat = basename($fajl['name']);
        $velicina = round($fajl['size'] / 1024);
        if ($fajl['error'] != 0) {
            throw new Exception("Greska prilikom postavljanja fajla pod brojem: " . $fajl['error']);
        }
        $ext = array("pdf", "doc", "docx", "ppt", "pptx", "zip");
        $mime_types = array("application/msword", "application/vnd.openxmlformats-officedocument.wordprocessingml.document", "application/pdf",
            "application/vnd.openxmlformats-officedocument.presentationml.presentation", "application/powerpoint", "application/zip");
        if (1048576 < $fajl['size']) {
            throw new Exception("Nedozvoljena velicina fajla");
        }
        if (!(in_array($tip, $ext)) || !(in_array($fajl['type'], $mime_types))) {
            throw new Exception("Pogresan tip fajla");
        }
        $odsek = $this->getOdsek($predmetID);
        $pathname = $_SERVER['DOCUMENT_ROOT'] . "diplomski/upload/$odsek/$predmetID/lab_vezbe/";
        if (!is_dir($pathname)) {
            mkdir($pathname, 0777, true);
        }
        move_uploaded_file($fajl['tmp_name'], $pathname . '/' . $naziv_mat);
        $query = "INSERT INTO lab_materijali (naziv, fajl, id_lab, tip, velicina, datum, autor) 
                  VALUES ('$naziv','$naziv_mat', $labID, '$tip', $velicina, NOW(), '$autor')";
        $this->db->SqlQuery($query);
    }
    public function getLabMaterijali($predmetID){
        $query = "SELECT * FROM lab_vezbe INNER JOIN lab_materijali
                  ON (lab_vezbe.ID = lab_materijali.id_lab)
                  WHERE id_predmet = $predmetID";
        $result = $this->db->SqlQuery($query);
        $materijali = array();
        while ($row = $this->db->FetchArray($result)){
            $materijali[] = $row;
        }
        return $materijali;
    }

}
    
?>
