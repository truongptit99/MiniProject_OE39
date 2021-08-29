<?php 
    session_start();

    if(isset($_POST['check'])){
        if($_POST['check'] == 1){
            $_SESSION['remember me'] = 1;
            echo "check = 1";
        }else{
            unset($_SESSION['remember me']);
            echo "check = 0";
        }
    }
?>