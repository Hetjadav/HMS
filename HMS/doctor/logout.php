<?php
    session_start();

    if (isset($_SESSION['doctor'])) {
        unset($_SESSION['doctor']);

        header("Location:../include/index.php");
    }

?>