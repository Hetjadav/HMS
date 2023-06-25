<?php
    session_start();
  
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Appointment</title>
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
                    <h5 class="text-center my-2" >Book Appointment</h5><br>
                    <?php
                        $pat = $_SESSION['patient'];
                        $query = "SELECT * FROM patient WHERE username='$pat'";
                        $res = mysqli_query($connect,$query);

                        $row = mysqli_fetch_array($res);

                        $username = $row['username'];
                        $gender = $row['gender'];
                        $phone = $row['phone'];

                        if (isset($_POST['book'])) {
                            $date = $_POST['date'];
                            $sym = $_POST['sym'];

                            if (empty($sym)) {
                                # code...
                            }else {
                                $query = "INSERT INTO appointment(username, gender, phone, appointment_date, symptoms, status, date_booked) 
                                VALUES('$username','$gender','$phone','$date','$sym','Pendding',NOW())";

                                $res = mysqli_query($connect,$query);

                                if ($res) {
                                    echo "<script>alert('You have booked an appointment successfully')</script>";
                                }
                            }
                        }
                        
                    
                    
                    ?>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6 jumbotron bg-gray">
                                <form action="" method="post">
                                    <label for="">Appointment Date</label>
                                    <input type="date" name="date" id="" class="form_control"><br>

                                    <label for="">Symptoms</label>
                                    <input type="text" name="sym" id="" class="form-control" autocomplete="off" placeholder="Enter Symptoms"><br>

                                    <input type="submit" name="book" id="" class="btn btn-info my-2" value="Book Appointment">


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