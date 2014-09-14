<?php

    
    class Db {
        private $sMySqlHost       = "";
        private $sMySqlUserName   = "";
        private $sMySqlPassword   = "";
        private $sMySqlDatabase   = "";
        private $db               = NULL;        
        
        public function __construct($host,$username,$password,$database){
            $this->sMySqlHost         = $host;
            $this->sMySqlUserName     = $username;
            $this->sMySqlPassword     = $password;
            $this->sMySqlDatabase     = $database;
            
            $this->Connect();
        }
        
        public function Connect(){
            $this->db = new mysqli($this->sMySqlHost,$this->sMySqlUserName,$this->sMySqlPassword,$this->sMySqlDatabase);
            $this->SqlQuery("SET NAMES 'utf8'");
            if(mysqli_connect_errno()) {
                throw new Exception($this->db->connect_error, $this->db->connect_errno);
            } 
        }
        
        public function SqlQuery($sQuery){
            if(is_null($this->db)){
                $this->Connect();
            }            
            if(!is_null($this->db)){
                if($result=$this->db->query($sQuery)){
                    return $result;
                }else{
                    throw new Exception($this->db->error, $this->db->errno);
                }
            }else{
                throw new Exception("Database connection failed!", 4001);
            }
        }
        
        public function FetchArray($result){
            $row=$result->fetch_array();
            return $row;
        }
        
        public function GetNumRows($res){
            if($res==''){
                if(!is_null($this->res) && $this->res!=''){
                    return $this->res->num_rows;
                }else {
                    throw new \Exception("MySQL resource is not valid!", 4002);
                }
            }else{
                return $res->num_rows;
            }
        }

        public function GetAffectedRows(){
            return $this->db->affected_rows;
        }

        public function GetLastInsertID(){
            return $this->db->insert_id;
        }

        public function FreeResult(){
            return $this->db->free();
        }

        public function CloseConnection(){
            return $this->db->close();
        }                
        
        public function EscapeString($Str){
            return $this->db->real_escape_string($Str);
        }
    }

?>
