<!DOCTYPE html>
<html>
    <head>
        <title>

        </title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" type="text/css">
        <script src="https://code.jquery.com/jquery-3.7.0.slim.js" integrity="sha256-7GO+jepT9gJe9LB4XFf8snVOjX3iYNb0FHYr5LI1N5c=" crossorigin="anonymous"></script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css" type="text/css">
    </head>
    <body>
    <nav class="navbar navbar-expand-lg navbar-info bg-info">
        <h5 class="text-white">Hospital Management System </h5>

        <div class="mr-auto"></div>
        <ul class="navbar-nav">
            <?php
             
             if(isset($_SESSION['admin'])){
                $user = $_SESSION['admin'];
                echo("
                <li class='nav-item'><a href='#' class='nav-link text-white' >$user</a></li>
                <li class='nav-item'><a href='../admin/logout.php' class='nav-link text-white' >logout</a></li>");

             }elseif(isset($_SESSION['doctor'])){
                $user =$_SESSION['doctor'];
                echo("<li class='nav-item'><a href='#' class='nav-link text-white' >$user</a></li>
                <li class='nav-item'><a href='../doctor/logout.php' class='nav-link text-white' >logout</a></li>");

             }elseif (isset($_SESSION['patient'])) {
                $user= $_SESSION['patient'];
                echo   ("<li class='nav-item'><a href='#' class='nav-link text-white' >$user</a></li>
                <li class='nav-item'><a href='../patient/logout.php' class='nav-link text-white' >logout</a></li>");
             }
             
             else{
                echo('<li class="nav-item"><a href="index.php" class="nav-link text-white" >Home</a></li>
                <li class="nav-item"><a href="adminlogin.php" class="nav-link text-white" >Admin</a></li>
                <li class="nav-item"><a href="doctorlogin.php" class="nav-link text-white" >Doctor</a></li>
                <li class="nav-item"><a href="patientlogin.php" class="nav-link text-white" >Patient</a></li>');
             }
            ?>
            
        </ul>

    </nav>
    </body>
</html>