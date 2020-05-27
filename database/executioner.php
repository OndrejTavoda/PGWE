<?php 
    class Executioner {
        private $conn;
        public  function establishConnection(){
            // configuration of the database
            include 'config.php';
            // Create connection
            $this->conn = new mysqli($servername, $username, $password,$dbname);

            // Check connection
            if ($this->conn->connect_error) {
                die("Connection failed: " . $this->$conn->connect_error);
                throw new Exception('SQL Connection Error'.$sql.$this->$conn->error);
            }
            return $this->conn;
        }
}
?>