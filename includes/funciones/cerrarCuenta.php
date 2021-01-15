<?php
   // require 'bD_coneccion.php';
    session_start();
    //$_SESSION['username']=false;
    header("location: ../../cuenta.php");
    session_destroy();
    
    exit();
?>