<?php

    session_start();
    include("connection.php");
    


    if (isset($_POST['login'])) {
        
        $uname = $_POST['uname'];
        $password = $_POST['pass'];


        $error = array();

        $q = "SELECT * FROM doctors WHERE firstname='$uname' AND password='$password'";
        $qq = mysqli_query($connect,$q);

        $row = mysqli_fetch_array($qq);

        if (empty($uname)) {
            $error['login']= "Enter username";
            
        }elseif (empty($password)) {
            $error['login']="Enter password";
        }

        if (count($error)==0) {
            $query = "SELECT * FROM doctors WHERE firstname='$uname' AND password='$password'";
            $res = mysqli_query($connect,$query);

            if (mysqli_num_rows($res)) {
                echo "<script>alert('done')</script>";
                $_SESSION['doctor']= $uname;
                header("Location:../doctor/index2.php");
            }else{
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
    <title>doctorlogin page</title>
</head>
<body style="background-image: url(../include/image/hospital.avif); background-size:cover ;background-repeat: no-repeat">
    <?php
    include("header.php");
    ?>

    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6 jumbotron my-3">
                    <h4 class="text-center my-5">Doctors Login</h4>
                        <div>
                            <?php
                                if (isset($error['login'])) {
                                    $l = $error['login'];
                            
                                    $show ="<h5 class='text-center alert alert-danger'>$l</h5>";
                                }else {
                                    $show = "";
                                }
                                echo $show;
                            ?>
                        </div>

                    <form method="post">
                        <div class="form-group">
                            <label for="">Username</label>
                            <input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter Username" >
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" name="pass" class="form-control">
                        </div>

                        <input type="submit" name="login" id="" class="btn btn-success text-center" value="Login">
                        
                        <p>I don't have account<a href="Apply.php">Apply Now!!!</a></p>
                    </form>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </div>
    
</body>
</html>