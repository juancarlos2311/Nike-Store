<?php
    session_start();
    require 'bD_coneccion.php';
        $id =$_SESSION['id'];
        $docimcili =$_POST['dom_Domicilio'];
        $codigoP = $_POST['dom_CogogoPostal'];
        $pais =$_POST['dom_Pais'];
        $estado = $_POST['dom_estado'];
        $celular = $_POST['dom_celular'];
       
    if(isset($_SESSION['id'])){
        
        $sq ="SELECT count(*) as contar FROM domicilio WHERE idCliente = '$id'";
        $c = mysqli_query($coneccion,$sq);
        $array = mysqli_fetch_array($c);
        if($array['contar'] > 0){
            //Si existe
            $sqlUPD="UPDATE domicilio 
            SET dom_Direccion = '$docimcili', dom_CodigoPostal = '$codigoP',
            dom_Pais = '$pais', dom_Estado = '$estado', don_Celular = '$celular'
            WHERE idCliente LIKE '$id';";
            $con = mysqli_query($coneccion,$sqlUPD);
            echo $id;
            if($con){
                header("location: ../../datos-usuario.php");
            }else{
 
                echo"Datos incorrectos en  $con upd";
            }
        }else{
            //No exixte
            $sqlIN="INSERT INTO domicilio (idDomicilio, dom_Direccion, dom_CodigoPostal, dom_Pais, dom_Estado, don_Celular, idCliente) 
            VALUES (NULL, '$docimcili', '$codigoP', '$pais', '$estado', '$celular', '$id');";
            $consult = mysqli_query($coneccion,$sqlIN);
            if($consult){
                header("location: ../../datos-usuario.php");
            }else{
                echo"Datos incorrectos en insertar";
            }
        }
    }else{
        echo "No id";
    }
?>