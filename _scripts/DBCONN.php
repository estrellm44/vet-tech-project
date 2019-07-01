<?php

    class DBCONN {
        
        private $server;
        private $username;
        private $password;
        private $dbname;
        
        //Function to connect to the Database
        protected function connect(){
            $this->server = "127.0.0.1";
            $this->username = "sheehanj";
            $this->password = "";
            $this->dbname = "vet-tech-test";
            
            $conn = new mysqli($this->server, $this->username, $this->password, $this->dbname);
            
            return $conn;
        }
        
    }