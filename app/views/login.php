<?php
    if(isset($_SESSION['username']) || isset($_COOKIE['username'])){
        header("Location: http://www.truongcr.com/products/home");
    }
?>
<!doctype html>
<html lang="en">

<head>
    <title>Log in</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        <?php include_once("../public/assets/css/login.css") ?>
    </style>
    <script>
        window.history.forward();
    </script>
</head>

<body>
    <div class="login-form">
        <form action="/login/check" method="post">
            <h2 class="text-center">Log in</h2>
            <div class="form-group">
                <input type="text" class="form-control" name="username" value="<?php if(isset($username)) echo $username; ?>" placeholder="Username" required="required">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" value="<?php if(isset($password)) echo $password; ?>" placeholder="Password" required="required">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Log in</button>
            </div>
            <div class="clearfix">
                <label class="float-left form-check-label"><input type="checkbox" id="myCheck" onclick="myFunction()"> Remember me</label>
                <a href="#" class="float-right">Forgot Password?</a>
            </div>
        </form>
        <p class="text-center"><a href="#">Create an Account</a></p>
        <br>
        <?php if(isset($error_login)){?>
            <div class="alert alert-danger text-center"><?php echo $error_login; ?></div>
        <?php } ?>
    </div>
    <script>
        function loadAjax(checkNum){
            $.ajax({
                url: "http://www.truongcr.com/rmb.php",
                type: "post",
                data: {
                    check: checkNum
                },
                success: function (result){
                    if(checkNum == 1){
                        console.log(result);
                    }else{
                        console.log(result);
                    }     
                }
            });
        }
        function myFunction(){
            var myCheck = document.getElementById('myCheck');           
            if(myCheck.checked == true){
                loadAjax(1);
            }else{
                loadAjax(0);
            }
            
        }
    </script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
    <script src="https://code.jquery.com/jquery-latest.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>