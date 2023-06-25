<?php
    session_start();
    include("../include/connection.php");

    if (isset($_POST['create'])) {
        $uname = $_POST['uname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $gender = $_POST['gender'];
        $country = $_POST['country'];
        $pass = $_POST['pass'];
        $con_pass = $_POST['con_pass'];

        $error = array();

        if (empty($uname)) {
            $error['create']="Enter Username";
        }elseif (empty($email)) {
            $error['create']="Enter Email";
        }elseif (empty($phone)) {
            $error['create']="Enter phone number";
        }elseif (empty($gender)) {
            $error['create']="Enter your gender";
        }elseif (empty($country)) {
            $error['create']="Enter your country";
        }elseif (empty($pass)) {
            $error['create']="Enter your password";
        }elseif (empty($con_pass)) {
            $error['create']="Enter confirm password";
        }elseif ($con_pass != $pass) {
            $error['create']="Confirm Password not matched ";
        }

        if (count($error)==0) {
            $query = "INSERT INTO patient(username, email, phone, gender, country, password, date_reg, profile) VALUES('$uname','$email','$phone','$gender','$country','$pass',now(),'patient.jpg')";

            $res = mysqli_query($connect,$query);

            if ($res) {
                header("Location:patientlogin.php");
            }else{
                echo "<script>alert('failed')</script>";
            }
        }
    }

    if (isset($error['create'])) {
        $l = $error['create'];

        $show ="<h5 class='text-center alert alert-danger'>$l</h5>";
    }else {
        $show = "";
    }

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account</title>
</head>
<body>
    <?php
        include("header.php");
    ?>

    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6 my-2 jumbotron">
                    <h5 class="text-center text-info my-2 ">Crate Account</h5>

                    <form action="#" method="post">
                        <div class="form-group">
                            <label for="">Username</label>
                            <input type="text" name="uname" id="" class="form-control" autocomplete="off" placeholder="Enter Username">

                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" name="email" id="" class="form-control" autocomplete="off" placeholder="Enter email">

                        </div>
                        <div class="form-group">
                            <label for="">Phone no</label>
                            <input type="number" name="phone" id="" class="form-control" autocomplete="off" placeholder="Enter phone number">

                        </div>
                        <div class="form-group">
                            <label for="">Gender</label>
                            <select name="gender" class="form-control" id="">
                                <option value="">Select your gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>

                        </div>
                        <div class="form-group">
                            <label for="">Country</label>
                           <select name="country" class="form-control" >
                            <option value="">Selcet country</option>
                            <option value="india">India</option>
                            <option value="russia">Russia</option>
                            <option value="usa">America</option>
                           </select>

                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" name="pass" id="" class="form-control" autocomplete="off" placeholder="Enter password">

                        </div>
                        <div class="form-group">
                            <label for="">Confirm Password</label>
                            <input type="password" name="con_pass" id="" class="form-control" autocomplete="off" placeholder="Enter confirm password">

                        </div>
                        <input type="submit" name="create" id="" value="crate account" class="btn btn-info">
                        <p>
                            i already have an account <a href="patientlogin.php">Click here.</a>
                        </p>
                    </form>

                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </div>
    
</body>
</html>