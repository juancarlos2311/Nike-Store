<?php

require 'bD_coneccion.php';

$Nombre = $_POST['mi_select'];


$sql="DELETE FROM producto
      WHERE idProducto = $Nombre;";

$ejecutar=mysqli_query($coneccion, $sql);

if ($ejecutar){ 
    header("location: ../../admin.php");
}
else{
   echo "datos guardados correctamente";
}

?>