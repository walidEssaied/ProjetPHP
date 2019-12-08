<?php

    class BasesDonnees
    {
        private $dbhost = 'localhost';
        private $dbname = 'food';
        private $dbuser = 'root';
        private $dbpw = '';
        
        public $conn = null;

        public function connectDB()
        {
            try {
                $this->conn = new PDO('mysql:host='.$this->dbhost.';dbname='.$this->dbname, $this->dbuser, $this->dbpw);
            } catch (PDOException $e) {
                echo $e->getMessage();
            }

            return $this->conn;
        }
    }
    ?>