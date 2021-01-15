<?php
    require 'bD_coneccion.php';
    
    session_start();
    $correo =$_POST['usr_correor'];
    $contrasena = $_POST['user_contraseñar'];
    $celular =$_POST['user_celular'];
    $nombre = $_POST['user_nombre'];
    $apellido = $_POST['user_apellido'];
    //Faltan
    $pais =$_POST['user_pais'];
    $genero =$_POST['user_genero'];
    //echo"<h2>Error $correo</h2>";
    $q ="INSERT INTO usuario (idUsuario, use_Nombre, use_Apellidos, use_Celular, use_Correo, use_Contraseña, idPago,idTipoUsuario) 
    VALUES (NULL, '$nombre', '$apellido', '$celular', '$correo', '$contrasena', '0','0');";

    $consult = mysqli_query($coneccion,$q);
  
    if($consult){
        $_SESSION['username']=$correo;
       //echo "<h2> $_SESSION[username]</h2>";
        header("location: ../../datos-usuario.php");
    }else{
        header("location: ../../cuenta.php?error=123456");
    }

?>