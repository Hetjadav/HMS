<?php
 include("connection.php");

 if(isset($_POST['apply'])){
    $firstname =$_POST['fname'];
    $surname =$_POST['sname'];
     $lastname =$_POST['lname'];
     $email =$_POST['email'];
     $gender= $_POST['gender'];
     $phone =$_POST['phone'];
     $country =$_POST['country'];
     $password =$_POST['pass'];
     $confirm =$_POST['cnpass'];
     
     $error = array();
     if (empty($firstname)) {

        $error['apply'] = "Enter firstname";
     }elseif (empty($surname)) {
        $error['apply'] = "Enter  Surname";
     }elseif (empty($lastname)) {
        $error['apply'] = "Enter Lastname";
     }elseif (empty($email)) {
        $error['apply'] = "Enter Emial Address";
     }elseif (empty($gender)) {
        $error['apply'] = "Select Your Gender";
     }elseif (empty($phone)) {
        $error['apply'] = "Enter Phonenumber";
     }elseif (empty($country)) {
        $error['apply'] = "Select Your Country";
     }elseif (empty($password)) {
        $error['apply'] = "Enter Password";
     }elseif (empty($confirm !== $password)) {
        $error['apply'] = "Enter confirmed Password";
     }
     if (count($error)==0) {
        
        $query="INSERT INTO doctors(firstname, surname, lastname, email, gender, phone, country, password, salary, data_reg, status, profile) 
        VALUES('$firstname','$surname','$lastname','$email','$gender','$phone','$country','$password','0',NOW(),'Pendding','doctor.jpg' )";

        $result = mysqli_query($connect,$query);
        if ($result) {
            echo "<script>alert('You have Successfully Appled')</script>";

            header("Location:../include/doctorlogin.php");
        }else {
            echo "<script>alert('Failed')</script>";
        }
     }

 }
 if (isset($error['apply'])) {
    $s = $error['apply'];
    $show = "<h5 class='text-center alert alert-danger'>$s</h5>";
 }else{
    $show= " ";
 }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apply now!!</title>
</head>
<body style="background-image: url(image/hospital.avif);background-size:cover">
    <?php
    include("header.php");
    ?>

    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6 my-3 jumbotron">
                    <h5 class="text-center">Apply Now!!!</h5>
                    <div>
                        <?php echo $show;  ?>
                    </div>
                    <form  method="post" >
                        <div class="form-group">
                            <label for="">Firstname</label>
                            <input type="text" name="fname" class="form-control" autocomplete="off"  placeholder="Enter Firstname" 
                                    value="<?php if(isset($_POST['fname'])) echo $_POST['fname'];  ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Surname</label>
                            <input type="text" name="sname" class="form-control" autocomplete="off"  placeholder="Enter Surname" 
                                    value="<?php if(isset($_POST['sname'])) echo $_POST['sname'];  ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Lastname</label>
                            <input type="text" name="lname" class="form-control" autocomplete="off"  placeholder="Enter Lastname" 
                                    value="<?php if(isset($_POST['lname'])) echo $_POST['lname'];  ?>">
                        </div>
                        <div class="form-group">
                            <label for="">E-mail</label>
                            <input type="email" name="email" class="form-control" autocomplete="off"   placeholder="Enter Email Address " 
                                    value="<?php if(isset($_POST['email'])) echo $_POST['email'];  ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Select Gender</label>
                            <select name="gender" id="" class="form-control">
                                <option value="">Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Femlae">Female</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Phone</label>
                            <input type="number" name="phone" class="form-control" autocomplete="off" placeholder="Enter Phone Number" 
                                    value="<?php if(isset($_POST['phone'])) echo $_POST['phone'];  ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Select Country</label>
                            <select name="country" id="" class="form-control">
                                <option value="">Select Country</option>
                                <option value="India">India</option>
                                <option value="Russia">Russia</option>
                                <option value="Ghana">Ghana</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" name="pass" class="form-control" autocomplete="off" placeholder="Enter Password">
                        </div>
                        <div class="form-group">
                            <label for="">Confirm Password</label>
                            <input type="password" name="cnpass" class="form-control" autocomplete="off" placeholder="Confirmed Password">
                        </div><br>
                        <input type="submit" name="apply" value="Apply Now" class="btn btn-success">
                        <p>I already have an account<a href="doctorlogin.php"> Click here</a></p>
                    </form>
                </div>
                <div class="com-md-3"></div>
            </div>
        </div>
    </div>
</body>
</html>