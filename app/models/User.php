<?php
    session_start();
    require_once("../public/connection.php");

    class User{
        private $conn;

        public function __construct()
        {
            $this->conn = DB::connect();   
        }

        public function checkLogin($username, $password){
            $sql = "select * from users where username = '$username' and password = $password";
            try{
                $result = $this->conn->query($sql);
                $count = 0;
                if(!$result) return false;
                else $count = mysqli_num_rows($result);
                if($count == 1){
                    $row = mysqli_fetch_assoc($result);
                    $_SESSION['name'] = $row['name'];
                    return true;
                }
                else return false;
            }catch(Exception $ex){
                return false;
            }    
        }
    }
?>