<?php
    session_start();
    require 'bD_coneccion.php';
    $id =$_SESSION['idPro'];
    $nombre =$_POST['nombre'];
    $precio = $_POST['precio'];
    $categoria =$_POST['categoria'];
    $descripcionC = $_POST['descripcionC'];
    $descripcionL = $_POST['descripcionL'];
    $imag1 =$_POST['img1'];
    $imag2 =$_POST['img2'];
    $imag3 =$_POST['img3'];
    $imag4 =$_POST['img4'];
    $imag5 =$_POST['img5'];
    $imag6 =$_POST['img6'];
   
    $sq1 ="SELECT idProducto as id FROM producto WHERE idProducto = '$id';";
    $co = mysqli_query($coneccion,$sq1);
    $array1 = mysqli_fetch_array($co);
    $idp = $array1['id'];

    if(isset($_SESSION['idPro'])){ 
        if($idp > 0){
            //Si existe
            if($imag1 !=false){
                $sqlUPD="UPDATE producto 
                SET pro_Nombre = '$nombre', pro_Precio = '$precio',
                pro_DescripcionCorta = '$descripcionC', pro_DescripcionLarga = '$descripcionL',  pro_RutaImagen ='$imag1',idCategoria ='$categoria'
                WHERE idProducto = '$idp';";
                $con = mysqli_query($coneccion,$sqlUPD);
                if($con){
                    header("location: ../../admin.php");
                }else{
                    echo"Datos incorrectos en upd $sqlUPD";
                    //header("location: ../../404.html");
                } 
            }else{
                echo "Estan vacios";
                //header("location: ../../404.html");
            }
           
        }else{
            $sqlINS="INSERT INTO imagenes (idImagen, img_UrlImg2, img_UrlImg3, img_UrlImg4, img_UrlImg5, img_UrlImg6) 
            VALUES (NULL, '$imag2', '$imag3','$imag4', '$imag5', '$imag6');";
            $conIns = mysqli_query($coneccion,$sqlINS);
            if($conIns){
                $rs = mysqli_query($coneccion,"SELECT MAX(idImagen) AS idI FROM imagenes");
                $row = mysqli_fetch_array($rs);
                $sqlinsP="INSERT INTO producto (idProducto, pro_Nombre, pro_Precio, 
                pro_DescripcionCorta, pro_DescripcionLarga, pro_RutaImagen, idCategoria, idImagen, idTalla) 
                VALUES (NULL, '$nombre', '$precio', '$descripcionC', '$descripcionL',
                '$imag1', '$categoria', '$row[0]', '1');";
                $conInsP = mysqli_query($coneccion,$sqlinsP);
                if($conInsP){
                    header("location: ../../admin.php");
                }else{
                    echo "nada ".$sqlinsP;
                   // header("location: ../../404.html");
                }
               
            }else{
                echo "Nanda img"; 
                //header("location: ../../404.html");
            }
        }
    }else{
    }
?>