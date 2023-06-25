<?php
session_start();
?>



<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin Dashboard</title>
    <script src="https://kit.fontawesome.com/a339054b85.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php
    include("../include/header.php");
    include("../include/connection.php");
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2" style="margin-left: -30px ;">
                <!--side nav--->
                <?php
                include("sidenav.php");
                ?>

            </div>
            <div class="col-md-10">
                <h4 class="my-4">Admin Dashboard</h4>
                <div class="col-md-12 my-1">
                    <div class="row">
                        <div class="col-md-3 bg-success mx-3" style="height: 130px;">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-9">
                                        <?php
                                        $ad = mysqli_query($connect, "SELECT * FROM admin");
                                        $num = mysqli_num_rows($ad);
                                        ?>
                                        <h5 class="my-2 text-white" style="font-size: 30px;"><?php echo $num; ?></h5>
                                        <h5 class="text-white">Total</h5>
                                        <h5 class="text-white">Admin</h5>

                                    </div>
                                    <div class="col-md-3">
                                        <a href="Admin1.php"><i class="fa-solid fa-user-group fa-3x my-3 " style="color: white;"></i></a>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-3 bg-info mx-3" style="height: 130px;">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-9">
                                        <?php
                                        $doctors = mysqli_query($connect, "SELECT * FROM doctors WHERE status='Approved'");

                                        $num = mysqli_num_rows($doctors)
                                        ?>
                                        <h5 class="my-2 text-white" style="font-size: 30px;"><?php echo $num; ?></h5>
                                        <h5 class="text-white">Total</h5>
                                        <h5 class="text-white">Doctors</h5>

                                    </div>
                                    <div class="col-md-3">
                                        <a href="doctor.php"><i class="fa-solid fa-user-doctor fa-4x my-3" style="color:white;"> </i></a>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-3 bg-warning mx-3" style="height: 130px;">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-9">
                                    <?php
                                        $patient = mysqli_query($connect, "SELECT * FROM patient ");

                                        $num = mysqli_num_rows($patient)
                                        ?>
                                        <h5 class="my-2 text-white" style="font-size: 30px;"><?php echo $num; ?></h5>
                                        <h5 class="text-white">Total</h5>
                                        <h5 class="text-white">Patient</h5>

                                    </div>
                                    <div class="col-md-3">
                                        <a href="patient.php"><i class="fa-solid fa-bed-pulse fa-3x my-3" style="color: white;"></i></a>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-3 bg-danger mx-3 my-3" style="height: 130px;">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-9">
                                    <?php
                                        $re = mysqli_query($connect, "SELECT * FROM patient");

                                        $num = mysqli_num_rows($re);
                                        ?>

                                        <h5 class="my-2 text-white" style="font-size: 30px;"><?php echo $num; ?></h5>
                                        <h5 class="text-white">Total</h5>
                                        <h5 class="text-white">Report</h5>

                                    </div>
                                    <div class="col-md-3">
                                       <a href="report.php"> <i class="fa-solid fa-flag fa-3x my-3" style="color: white;"></i></a>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-3 bg-warning mx-3 my-3" style="height: 130px;">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-9">
                                        <?php
                                        $job = mysqli_query($connect, "SELECT * FROM doctors WHERE status='Pendding'");

                                        $num = mysqli_num_rows($job);
                                        ?>
                                        <h5 class="my-2 text-white" style="font-size: 30px;"><?php echo $num; ?></h5>
                                        <h5 class="text-white">Total</h5>
                                        <h5 class="text-white">Job Request</h5>

                                    </div>
                                    <div class="col-md-3">
                                        <a href="job_request.php"> <i class="fa-sharp fa-solid fa-book-open fa-3x my-3" style="color: white;"></i></a>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-3 bg-success mx-3 my-3" style="height: 130px;">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-9">
                                        <?php
                                        $in = mysqli_query($connect, "SELECT sum(amount_paid)AS profit FROM income");

                                        $num = mysqli_fetch_array($in);

                                        $inc = $num['profit'];
                                        ?>
                                        <h5 class="my-2 text-white" style="font-size: 30px;"><?php echo "$$inc";?></h5>
                                        <h5 class="text-white">Total</h5>
                                        <h5 class="text-white">Income</h5>

                                    </div>
                                    <div class="col-md-3">
                                      <a href="income.php">  <i class="fa-sharp fa-solid fa-money-check-dollar fa-3x my-3 " style="color: white;"></i></a>
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