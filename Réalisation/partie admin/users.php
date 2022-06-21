<?php

    class users
    {
        private $servername = "localhost";
        private $username   = "root";
        private $password   = "";
        private $database   = "goofocus";
        public  $con;


        // Database Connection 
        public function __construct()
        {
            $this->con = new mysqli($this->servername, $this->username,$this->password,$this->database);
            if(mysqli_connect_error()) {
             trigger_error("Failed to connect to MySQL: " . mysqli_connect_error());
            }else{
            return $this->con;
            }
        }

        // Insert customer data into customer table
        public function insertData($post)
        {
            $username = $this->con->real_escape_string($_POST['username']);
            $password = $this->con->real_escape_string($_POST['password']);
            $created_at = $this->con->real_escape_string($_POST['created_at']);
            $query="INSERT INTO users (username,password,created_at) VALUES('$username','$password','$created_at')";
            $sql = $this->con->query($query);
            if ($sql==true) {
                header("Location:index.php?msg1=insert");
            }else{
                echo "Registration failed try again!";
            }
        }

        // Fetch user records for show listing
        public function displayData()
        {
            $query = "SELECT * FROM users";
            $result = $this->con->query($query);
        if ($result->num_rows > 0) {
            $data = array();
            while ($row = $result->fetch_assoc()) {
                   $data[] = $row;
            }
             return $data;
            }else{
             echo "No found records";
            }
        }


        // Delete user data from users table
        public function deleteRecord($id)
        {
            $query = "DELETE FROM users WHERE id = '$id'";
            $sql = $this->con->query($query);
        if ($sql==true) {
            header("Location:index.php?msg3=delete");
        }else{
            echo "Record does not delete try again";
            }
        }
    }
?>