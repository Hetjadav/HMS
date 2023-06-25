<?php
session_start();
error_reporting(0);

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient</title>
</head>

<body>
    <?php
    include("../include/header.php");
    include("../include/connection.php");

    ?>

    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2 " style="margin-left: -30px;">
                    <?php
                    include("sidenav.php");
                    $patient = $_SESSION['patient'];
                    $query = "SELECT * FROM patient WHERE username='$patient'";

                    $res = mysqli_query($connect, $query);

                    $row = mysqli_fetch_array($res);
                    ?>
                </div>
                <div class="col-md-10">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">

                                <?php
                                $patient = $_SESSION['patient'];
                                $query = "SELECT * FROM patient WHERE username='$patient'";
                                $res = mysqli_query($connect, $query);

                                $row = mysqli_fetch_array($res);

                                if (isset($_POST['upload'])) {
                                    $img = $_FILES['img']['name'];

                                    if (empty($img)) {
                                    } else {
                                        $query = "UPDATE patient SET profile='$img' WHERE username='$patient'";

                                        $res = mysqli_query($connect, $query);

                                        if ($res) {
                                            move_uploaded_file($_FILES['img']['tmp_name'], "img/$img");
                                        }
                                    }
                                }
                                ?>
                                <h5>My Profile</h5>
                                <form action="#" method="post" enctype="multipart/form-data">

                                    <?php
                                    echo "<img src='img/" . $row['profile'] . "'style='height: 250px;' class='col-md-12 my-3'>";
                                    echo '<br>';
                                    ?>


                                    <input type="file" name="img" class="form-control">
                                    <br>
                                    <input type="submit" name="upload" class="btn btn-success" value="Update Profile">
                                </form><br>



                                <table class="table table-bordered">
                                    <tr>
                                        <th colspan="2" class="text-center">My Details</th>
                                    </tr>

                                    <tr>
                                        <td>Username</td>
                                        <td><?php echo $row['username']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>E-mail</td>
                                        <td><?php echo $row['email']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Phone Number</td>
                                        <td><?php echo $row['phone']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Gender</td>
                                        <td><?php echo $row['gender']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Country</td>
                                        <td><?php echo $row['country']; ?></td>
                                    </tr>

                                </table>
                            </div>
                            <div class="col-md-6">
                                <h5 class="text-center my-2">Change Username</h5>
                                <?php

                                if (isset($_POST['change_uname'])) {
                                    $uname = $_POST['uname'];
                                    if (empty($uname)) {
                                    } else {
                                        $query = "UPDATE patient SET username='$uname' WHERE username='$patient'";
                                        $res = mysqli_query($connect, $query);

                                        if ($res) {
                                            $_SESSION['patient'] = $uname;
                                            echo "<script>alert('Username changed successfully')</script>";
                                        }
                                    }
                                }
                                ?>
                                <form action="#" method="post">
                                    <label>Change Username</label>
                                    <input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter Username">
                                    <br>
                                    <input type="submit" name="change_uname" class="btn btn-success" value="change username">
                                    <br><br>
                                    <h5 class="text-center my-2">Change Password</h5>

                                    <?php
                                    $a = $_POST['change_password'];
                                    if ($a) {
                                        $old = $_POST['old_pass'];
                                        $new = $_POST['new_pass'];
                                        $con = $_POST['con_pass'];

                                        $ol = "SELECT * FROM patient WHERE username='$patient'";

                                        $ols = mysqli_query($connect, $ol);

                                        $row = mysqli_fetch_array($ols);

                                        if ($old != $row['password']) {
                                            # code...
                                        } elseif (empty($new)) {
                                            # code...
                                        } elseif ($con != $new) {
                                            # code...
                                        } else {
                                            $query = "UPDATE patient SET password='$new' WHERE username='$patient'";

                                            mysqli_query($connect, $query);
                                            echo "<script>alert('Password Change Successfully')</script>";
                                        }
                                    }

                                    ?>
                                    <form action="#" method="post">
                                        <div class="form-group">
                                            <label>Old Password</label>
                                            <input type="password" name="old_pass" class="form-control" autocomplete="off" placeholder="Enter Old Password">
                                        </div>
                                        <div class="form-group">
                                            <label>New Password</label>
                                            <input type="password" name="new_pass" class="form-control" autocomplete="off" placeholder="Enter new Password">
                                        </div>
                                        <div class="form-group">
                                            <label>Confirm Password</label>
                                            <input type="password" name="con_pass" class="form-control" autocomplete="off" placeholder="Enter Confirm Password">
                                        </div>
                                        <input type="submit" name="change_password" class="btn btn-info" value="Change password">
                                    </form>
                                </form>



                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>