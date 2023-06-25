<?php
    session_start();
    include("connection.php");

    if (isset($_POST['login'])) {
        $uname = $_POST['uname'];
        $pass = $_POST['pass'];

        if (empty($uname)) {
            echo "<script>alert('Please enter Your name')</script>";
            
        }elseif (empty($pass)) {
            echo "<script>alert('Please enter password')</script>";
        }else{
            $query = "SELECT * FROM patient WHERE username= '$uname' AND password= '$pass'";
            $res = mysqli_query($connect,$query);

            if (mysqli_num_rows($res)==1) {
                header("Location:../patient/index3.php");

                $_SESSION['patient']=$uname;
            }else {
                echo "<script>alert('Invalid Account')</script>";
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient login page</title>
</head>
<body style="background-image: url(img/hospital.avif); background-repeat: no-repeat; background-size:cover;">

    <?php
        include("header.php");
    
    ?>
    
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6 my-5 jumbotron">
                    <h5 class="text-center my-3">Patient Login</h5>

                    <form action="#" method="post">
                        <div class="form-group">
                            <label >Username</label>
                            <input type="text" name="uname" id="" class="form-control" autocomplete="off" placeholder="Enter Username">
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" name="pass" class="form-control" autocomplete="off" placeholder="Enter Password">
                        </div>
                        <input type="submit" name="login" class="btn btn-info my-3" value="Login">
                        <p>I dont have an account. <a href="account.php">Click here.</a> </p>
                    </form>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </div>
    
</body>
</html>