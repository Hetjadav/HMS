<?php
    session_start();
    error_reporting(0);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor profile page</title>
</head>
<body>

    <?php
    include("../include/header.php");
    ?>

    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2" style="margin-left: -30px;">
                    <?php
                        include("sidenav.php");
                        include("../include/connection.php");
                    ?>
                </div>
                <div class="col-md-10">
                    <div class="container-fluid">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">

                                <?php
                                    $doc=$_SESSION['doctor'];
                                    $query = "SELECT * FROM doctors WHERE firstname='$doc'";
                                    $res = mysqli_query($connect,$query);

                                    $row = mysqli_fetch_array($res);

                                    if (isset($_POST['upload'])) {
                                        $img = $_FILES['img']['name'];

                                        if (empty($img)) {
                                            
                                        }else{
                                            $query= "UPDATE doctors SET profile='$img' WHERE firstname='$doc'";

                                            $res = mysqli_query($connect,$query);

                                            if ($res) {
                                                move_uploaded_file($_FILES['img']['tmp_name'],"img/$img");
                                            }
                                        }
                                    }
                                ?>

                                <form action="#" method="post" enctype="multipart/form-data">
                                    <br>
                                    <?php
                                    echo "<img src='img/".$row['profile'] ."'style='height: 250px;' class='col-md-12 my-3'>";
                                    echo '<br>';
                                    ?>
                                    

                                    <input type="file" name="img" class="form-control">
                                    <br>
                                    <input type="submit" name="upload" class="btn btn-success" value="Update Profile">
                                </form>

                                <div class="my-3">
                                    <table class="tabel table-bordered">
                                        <tr>
                                        <th colspan="2" class="text-center">Details</th>
                                        </tr>
                                        <tr>
                                            <td>Firstname</td>
                                            <td><?php echo $row['firstname'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Surname</td>
                                            <td><?php echo $row['surname'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Lastname</td>
                                            <td><?php echo $row['lastname'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td><?php echo $row['email'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Phone Number</td>
                                            <td><?php echo $row['phone'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Gender</td>
                                            <td><?php echo $row['gender'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Country</td>
                                            <td><?php echo $row['country'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Salary</td>
                                            <td><?php echo $row['salary'];?></td>
                                        </tr>
                                    </table>
                                </div>

                                </div>
                                <div class="col-md-6">
                                    <h5 class="text-center my-2">Change Username</h5>
                                    <?php

                                        if (isset($_POST['change_uname'])) {
                                            $fname = $_POST['uname'];
                                            if (empty($fname)) {
                                                
                                            }else{
                                                $query = "UPDATE doctors SET firstname='$fname' WHERE firstname='$doc'";
                                                $res = mysqli_query($connect,$query);

                                                if ($res) {
                                                    $_SESSION['doctor']= $fname;

                                                }
                                            }

                                        }
                                    ?>
                                    <form action="#" method="post">
                                        <label >Change Username</label>
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

                                                $ol = "SELECT * FROM doctors WHERE firstname='$doc'";

                                                $ols = mysqli_query($connect,$ol);

                                                $row = mysqli_fetch_array($ols);

                                                if ($old != $row['password']) {
                                                    # code...
                                                }elseif (empty($new)) {
                                                    # code...
                                                }elseif ($con != $new) {
                                                    # code...
                                                }else{
                                                    $query = "UPDATE doctors SET password='$new' WHERE firstname='$doc'";

                                                    mysqli_query($connect,$query);
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
    </div>
    
</body>
</html>