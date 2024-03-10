<?php
class card{
    public $conn;
    private $host;
    private $user;
    private $pass;
    private $dbname;

    public function __construct(){
        $this->host = "localhost";
        $this->user = "root";
        $this->pass = "";
        $this->dbname = "tickets";

        $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->dbname);
        if($this->conn->connect_error){
            echo "savienojums neizdevas";
        }
    }

        public function select($data){
            $result = $this->conn->query($data);
            if($result->num_rows>0){
                return $result;
            }else{
                return 0;
            }
        }
        public function insert($data){
            if($this->conn->query($data)===TRUE){
                return $this->conn->insert_id;
            }else{
                return $this->conn->error;
            }
        }
}