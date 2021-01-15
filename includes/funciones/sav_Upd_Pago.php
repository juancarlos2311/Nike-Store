<?php
    session_start();
    require 'bD_coneccion.php';
    $id =$_SESSION['id'];
    $tipopago =$_POST['usr_Pago'];
    $nombre = $_POST['usr_Nombre'];
    $numero =$_POST['usr_NumeroT'];
    $dia = $_POST['usr_Dia'];
    $mes = $_POST['usr_Mes'];
    $ano = $_POST['usr_año'];
    $fecha =$ano."-".$mes."-".$dia;
 
    $sq1 ="SELECT idPago as id FROM usuario WHERE idUsuario = '$id';";
    $co = mysqli_query($coneccion,$sq1);
    $array1 = mysqli_fetch_array($co);
    $idp = $array1['id'];
    if(isset($_SESSION['id'])){ 
        if($idp > 0){
            //Si existe
            $sqlUPD="UPDATE pago 
            SET pag_NombreCompleto = '$nombre', pag_NumeroTarjeta = '$numero',
            pag_Fecha = '$fecha', idTipoPago = '$tipopago'
            WHERE idPago = '$idp';";
            $con = mysqli_query($coneccion,$sqlUPD);
            if($con){
                header("location: ../../datos-usuario.php");
            }else{
                echo"Datos incorrectos en upd";
            }
        }else{
            //No exixt
            $sql="INSERT INTO pago(idPago, pag_NombreCompleto, pag_NumeroTarjeta, pag_Fecha, idTipoPago) 
            VALUES (NULL, '$nombre', '$numero', '$fecha', '$tipopago');";
            $consul = $coneccion->query($sql);
            
            if($consul){
                $sqlId ="SELECT idPago FROM pago WHERE pag_NumeroTarjeta = '$numero';";
                $aux = mysqli_query($coneccion,$sqlId);
                $res =  mysqli_fetch_row($aux);
                $idpago =$res[0];
               
                $sqlU = "UPDATE usuario SET idPago = '$idpago' WHERE usuario.idUsuario = '$id';";
                $aux = mysqli_query($coneccion,$sqlU);
                if($aux)
                    header("location: ../../datos-usuario.php");
                else
                    echo "No actualizado";    
               
            }else{
                echo"Datos incorrectos  ";
            }
        }
    }else{
        echo "No id";
    }
?>