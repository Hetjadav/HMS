<?php
    session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Doctor's Dashboard</title>
    <script src="https://kit.fontawesome.com/a339054b85.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php
    include("../include/header.php");
    include("../include/connection.php");
    ?>

    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2" style="margin-left: -30px;">
                    <?php
                     include("sidenav.php");
                    ?>
                </div>
                <div class="col-md-10">
                    <div class="container-fluid">
                        <h5>Doctor's Dashboard</h5>
                        <div class="com-md-12">
                            <div class="row">
                                <div class="col-md-3 my-2 bg-info mx-2" style="height: 150px;">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <h5 class="text-white my-4">My profile</h5>
                                        </div>
                                        <div class="col-md-4">
                                       <a href="profile.php"><i class="fa-solid fa-circle-user fa-3x my-4" style="color: white;"></i></a> 
                                        </div>
                                    </div>
                                </div>
                                </div>

                                <div class="col-md-3 my-2 bg-warning mx-2" style="height: 150px;">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <?php 
                                            $p=mysqli_query($connect,"SELECT * FROM patient");

                                            $pp = mysqli_num_rows($p);   ?>  
                                            
                                        <h5 class="text-white my-2" style="font-size: 28px;"><?php echo $pp;?></h5>
                                            <h5 class="text-white " style="font-size: 28px;">Total</h5>
                                            <h5 class="text-white " style="font-size: 28px;">Patient</h5>
                                        </div>
                                        <div class="col-md-4">
                                       <a href="../admin/patient.php"><i class="fa-solid fa-bed-pulse fa-3x my-4" style="color: white;"></i></a> 
                                        </div>
                                    </div>
                                </div>
                                </div>

                                <div class="col-md-3 my-2 bg-success mx-2" style="height: 150px;">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <?php
                                                $ap = mysqli_query($connect,"SELECT * FROM appointment WHERE status='Pendding' ");

                                                $appoint = mysqli_num_rows($ap);
                                            
                                            ?>
                                            <h5 class="text-white my-2" style="font-size: 28px;"><?php echo $appoint;?></h5>
                                            <h5 class="text-white " style="font-size: 28px;">Total</h5>
                                            <h5 class="text-white " style="font-size: 28px;">Appointment</h5>
                                            
                                        </div>
                                        <div class="col-md-4">
                                       <a href="appointment.php"><i class="fa-solid fa-calendar fa-3x my-4" style="color: white;"></i></a> 
                                        </div>
                                    </div>
                                </div>
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