<?php


class Vest {
    private $db;
    
    public function __construct($db) {
        $this->db = $db;
    }
    public function InsertVest($id_predmet, $naslov, $sadrzaj, $datum, $fajl=null){
        $query = "INSERT INTO vesti (id_predmet, naslov, sadrzaj, datum) VALUES ($id_predmet, '$naslov', '$sadrzaj', '$datum')";
         if(!$this->db->SqlQuery($query)){
             throw new Exception("Greska prilikom dodavanja vesti");
         }
         $id_vesti=  $this->db->GetLastInsertID();
         if($fajl!=null){
            $tmp = explode(".", $fajl['name']);
            $tip = end($tmp);
            $naziv = basename($fajl['name']);
            $ext = array("pdf", "doc", "docx", "ppt","pptx", "zip");
            $mime_types = array("application/msword", "application/vnd.openxmlformats-officedocument.wordprocessingml.document", "application/pdf",
                    "application/vnd.openxmlformats-officedocument.presentationml.presentation","application/powerpoint", "application/zip");        
            if( 1048576 < $fajl['size']){
              throw new Exception("Nedozvoljena velicina fajla");
              }
            if(!(in_array($tip, $ext)) || !(in_array($fajl['type'], $mime_types))){
            throw new Exception("Pogresan tip fajla");
            }
            $pathname = $_SERVER['DOCUMENT_ROOT']. "diplomski/upload/$id_predmet/vesti/";
            if(!is_dir($pathname)){
               mkdir($pathname, 0777, true);
              }
               move_uploaded_file($fajl['tmp_name'], $pathname.'/'.$naziv);
               $query = "INSERT INTO vesti_materijal (id_vest, naziv) VALUES ($id_vesti, '$naziv')";
               $this->db->SqlQuery($query);
        }
    }
    public function getVestByIDPredmet($id_predmet){
        $query = "SELECT * FROM vesti WHERE id_predmet IN($id_predmet)";
        $result = $this->db->SqlQuery($query);
        $niz = array();
        while($row = $this->db->FetchArray($result)){
            $niz[] = $row;
        }
        return $niz;
    }
    public function deleteVest($id){
        $query = "SELECT v.id_predmet, vm.ID, vm.naziv FROM vesti as v INNER JOIN vesti_materijal as vm ON (v.ID = vm.id_vest)
                  WHERE vm.id_vest = $id";
        $result = $this->db->SqlQuery($query);        
        while($row = $this->db->FetchArray($result)){
            if(unlink($_SERVER['DOCUMENT_ROOT']. "diplomski/upload/".$row['id_predmet']."/vesti/".$row['naziv'])){
                $query = "DELETE * FROM vesti_materijal WHERE ID =". $row['ID'];
                $this->db->SqlQuery($query);
            } else {
            throw new Exception ("Greška prilikom brisanja materijala");
            }
        }
        $query1 = "DELETE FROM vesti WHERE ID = $id";
         $this->db->SqlQuery($query1);
   }
}

?>
