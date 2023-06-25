<?php
    session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Total Appointment</title>
</head>
<body>
    <?php
        include("../include/header.php");
        include("../include/connection.php");
    ?>

    <div class="container-fluid">
        <div class="com-md-12">
            <div class="row">
                <div class="col-md-2 my-0" style="margin: -30px;">
                    <?php
                        include("sidenav.php");
                    ?>
                </div>
                <div class="col-md-10 my-1 fa-1x" >
                    <h5 class="text-center">Total Appointment</h5>
                    <?php
                        $query = "SELECT * FROM appointment WHERE status='Pendding'";
                        $res = mysqli_query($connect,$query);

                        $output ="";

                        $output .= "<table class='table table-bordered' style='margin-left:20px'>
                        <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Gender</th>
                        <th>Phone</th>
                        <th>Appointment Date</th>
                        <th>Symptoms</th>
                        <th>Date Booked</th>
                        <th>Action</th>


                     
                        </tr>
                        
                        
                        
                        ";
                        if (mysqli_num_rows($res)<1) {
                            $output .="
                            <tr>
                            <td colspan='8' class='text-center'>No Appointment YET</td>
                            </tr>
                            
                            ";
                        }

                        while ($row= mysqli_fetch_array($res)) {
                            $output .="
                            
                            <tr>
                            <td>".$row['id']."</td>
                            <td>".$row['username']."</td>
                            <td>".$row['gender']."</td>
                            <td>".$row['phone']."</td>
                            <td>".$row['appointment_date']."</td>
                            <td>".$row['symptoms']."</td>
                            <td>".$row['date_booked']."</td>
                            <td>
                                            <a href='discharge.php?id=".$row['id']."'>
                                                <button class='btn btn-info'>Check</button>
                                            </a>
                            </td>
                            
                            
                            ";
                        }

                        $output .= "</tr></table>";

                        echo $output;

                    
                    
                    ?>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>