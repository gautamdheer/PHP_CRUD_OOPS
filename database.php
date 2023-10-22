<?php
class Database{

    private $db_host = "localhost";
    private $db_user = "root";
    private $db_pass = "";
    private $db_name = "testing";
    
    private $conn = false;
    private $result = array();
    private $mysqli = "";
    
    // function automatically call
    public function __construct(){
        if(!$this->conn){
            $this->mysqli = new mysqli($this->db_host,$this->db_user,$this->db_pass,$this->db_name);
            
            $this->conn = true;

            if($this->mysqli->connect_error){
                array_push($this->result,$this->mysqli->connect_error);
                return false;
            }
        }
        else{
                 return true;
        }
        // echo "Database connected";
    }
    
    // function to insert into the database
    public function insert($table, $parms=[]){
        if($this->tableExists($table)){

            $table_columns = implode(", ", array_keys($parms));
            $table_value = implode("','", $parms);

            $sql = "INSERT INTO $table ($table_columns) VALUES ('$table_value')";

            if($this->mysqli->query($sql)){
                array_push($this->result, $this->mysqli->insert_id);
                return true;
            }
            else{
                array_push($this->result, $this->mysqli->error);
                return false;
            }

        }
        
    }
    
    // function to update row in database
    public function update(){

    }
    
    // function to delete table or rows from the database
    public function delete(){

    }

      
    // function to select from the database
    public function select(){

    }
    
    private function tableExists($table){
        $sql = "SHOW TABLES FROM $this->db_name LIKE '$table'";
        $tableInDB = $this->mysqli->query($sql);
         if($tableInDB){
            if($tableInDB->num_rows == 1){
                return true;
            }
            else{
                array_push($this->result, $table."doesn't exist in the database");
                return false;
            }
         }   
        
        //return $tableInDB;
    }

    public function getResult(){
        $val = $this->result;
        $this->result = array();
        return $val;
    }


    // function to close the connection
    public function __destrcut(){
        if($this->conn){    
            if($this->mysqli->close()){
                $this->conn = false;
                return true;
            }
        }
        else{
            return false;
        }
    }


}
?>