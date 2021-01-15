<?php
    require 'bD_coneccion.php';
    
    session_start();
    $correo =$_POST['usr_correo'];
    $contrasena = $_POST['user_contraseña'];
    //echo"<h2>Error $correo</h2>";
    $q ="SELECT COUNT(*) as contar FROM usuario WHERE use_Correo ='$correo' AND use_contraseña = '$contrasena';";

    $consult = mysqli_query($coneccion,$q);
    $array = mysqli_fetch_array($consult);
    $sqTip ="SELECT idTipoUsuario FROM usuario 
    WHERE use_Correo ='$correo' AND use_contraseña = '$contrasena'";
    $c = mysqli_query($coneccion,$sqTip);
    $res = mysqli_fetch_row($c);
 
    if($array['contar']>0){
        $sql ="SELECT idTipoUsuario  FROM usuario 
        WHERE use_Correo ='$correo' AND use_contraseña = '$contrasena' AND idTipoUsuario = '$res[0]';";
        $consulta = mysqli_query($coneccion,$sql);
        $arrayUs = mysqli_fetch_array($consulta);
        if($arrayUs['idTipoUsuario']>0){
            $_SESSION['username']=$correo;
            $_SESSION['adm'] =$correo;
            header("location: ../../admin.php");
        }else{
            $_SESSION['username']=$correo;
            header("location: ../../datos-usuario.php");
        }
    }else{
       header("location: ../../cuenta.php?error=1564582");
    }

?>