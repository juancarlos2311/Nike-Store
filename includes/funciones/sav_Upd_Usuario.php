<?php
    session_start();
    if(isset($_SESSION['id'])){
        require 'bD_coneccion.php';
        $id =$_SESSION['id'];
        $correo =$_POST['user_correo'];
        $contrasena = $_POST['user_contraseña'];
        $celular =$_POST['user_celular'];
        $nombre = $_POST['user_nombre'];
        $apellido = $_POST['user_apellido'];
       
        $sq ="UPDATE usuario 
        SET use_Nombre = '$nombre', use_Apellidos = '$apellido',
         use_Celular = '$celular', use_Correo = '$correo', use_Contraseña = '$contrasena' 
         WHERE idUsuario = '$id'";
        
        $consult = mysqli_query($coneccion,$sq);
        if($consult){
            //$_SESSION['username']=$correo;
            //echo "<h2> Exitoso $id, $correo, $contrasena, $celular, $nombre, $apellido, $consult</h2>";
            header("location: ../../datos-usuario.php");
        }else{
            echo"Datos incorrectos ";
        }
    }else{
        
        echo "No id";
    }
?>