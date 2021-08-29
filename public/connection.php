<?php 

require_once("../app/config/config.php");
class DB{
    private static $conn = NULL;
    public static function connect(){
        if(!isset(self::$conn)){
            try{
                self::$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
            }catch(Exception $ex){
                die($ex->getMessage());
            }
        }
        return self::$conn;
    }
}


?>