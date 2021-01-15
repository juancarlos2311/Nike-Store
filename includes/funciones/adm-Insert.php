<?php

require 'bD_coneccion.php';

$Nombre = $_POST['Nom'];
$Url = $_POST['URL'];
$DescripcionCorta = $_POST['Corta'];
$DescripcionLarga = $_POST['Larga'];
$Precio = $_POST['Precio'];
$categoria = $_POST['categoria'];
$Imagenes = $_POST['img1']
//Consulta de tallas
if($categoria == "Calzado"){
    $tallas = "2";
}else{
    $tallas = "1";
}



$sql="INSERT INTO producto  (idProducto, pro_Nombre, pro_Precio, pro_DescripcionCorta, pro_DescripcionLarga, pro_RutaImagen, idCategoria,idImagen,idTalla) 
VALUES(NULL, '$Nombre', '$Precio', '$DescripcionCorta', '$DescripcionLarga','$Url','$categoria','$Imagenes','$tallas');";

$ejecutar=mysqli_query($coneccion, $sql);

if ($ejecutar){ 
    header("location: ../../admin.php");
}
else{
   echo "datos guardados correctamente <br>";
}

?>