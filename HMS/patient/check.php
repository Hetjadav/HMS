<?php
    session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>view Invoice</title>
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
                    <h5 class="text-center my-2">View Invoice</h5>
                    <div class="col-md-12">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <?php
                                if (isset($_GET['id'])) {
                                    $id = $_GET['id'];

                                    $query = "SELECT * FROM income WHERE id = '$id'";

                                    $res = mysqli_query($connect,$query);
                                    $row = mysqli_fetch_array($res);
                                }
                            
                            ?>
                            <table class="table table-bordered " style="margin-left: 350px;">
                            <tr>
                                       <h4> <th class="text-center" colspan="2">Invoice Details</th></h4>
                                    </tr>
                                    <tr>
                                        <td>Doctor</td>
                                        <td><?php echo $row['doctor'];?></td>
                                    </tr>
                                    <tr>
                                        <td>Patient</td>
                                        <td><?php echo $row['patient'];?></td>
                                    </tr>
                                    <tr>
                                        <td>Date discharge</td>
                                        <td><?php echo $row['date_discharge'];?></td>
                                    </tr>
                                    <tr>
                                        <td>Amount Paid</td>
                                        <td><?php echo $row['amount_paid'];?></td>
                                    </tr>
                                    <tr>
                                        <td>Description</td>
                                        <td><?php echo $row['description'];?></td>
                                    </tr>
                                    
                            </table>
                        </div>
                        <div class="col-md-3"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>