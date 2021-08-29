<?php 
    require_once("../app/controllers/BaseController.php");
    require_once("../app/models/User.php");

    class LoginController extends BaseController{
        public function index(){
            if(isset($_COOKIE['username']) && isset($_COOKIE['password'])){
                header("Location: http://www.truongcr.com/products/home");
            }else{
                $this->view("login");
            }
        }

        public function check(){
            $username = $_POST['username'];
            $password = $_POST['password'];

            $user = new User();

            if($user->checkLogin($username, $password)){
                $_SESSION['username'] = $username;
                $_SESSION['password'] = $password;
                unset($_SESSION['error_login']);
                if(isset($_SESSION['remember me'])){
                    setcookie("username", $_SESSION['username'], time()+84600, "/", "", 0);
                    setcookie("password", $_SESSION['password'], time()+84600, "/", "", 0);
                    setcookie("name", $_SESSION['name'], time()+84600, "/", "", 0);
                    unset($_SESSION['remember me']);
                }
                header("Location: http://www.truongcr.com/products/home");
            }else{
                $_SESSION['error_login'] = "Login Failed!";
                $error_login = $_SESSION['error_login'];
                $data = ['username' => $username, "password" => $password, 'error_login' => $error_login];
                $this->view("login", $data);
            }
        }

        public function out(){
            setcookie("username", $_SESSION['username'], time()-60, "/", "", 0);
            setcookie("password", $_SESSION['password'], time()-60, "/", "", 0);
            setcookie("name", $_SESSION['name'], time()-60, "/", "", 0);
            session_destroy();
            header("Location: http://www.truongcr.com");
        }
    }
?>