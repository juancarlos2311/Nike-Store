<?php  
session_start();
$arreglo = $_SESSION['carrito'];

for($i=0;$i<count($arreglo);$i++){
    //echo  $arreglo[$i]['id']." = ". $_GET['id'];
    if($arreglo[$i]['id'] != $_GET['id']){
        $arregloNuevo[] = array(
            'id'=> $arreglo[$i]['id'],
            'nombre'=> $arreglo[$i]['nombre'],
            'precio'=> $arreglo[$i]['precio'],
            'descriCorta'=> $arreglo[$i]['descriCorta'],
            'talla'=>$arreglo[$i]['talla'],
            'imagen'=> $arreglo[$i]['imagen'],
            'cantidad'=>$arreglo[$i]['cantidad']
        );
    }
   
}
if(isset($arregloNuevo)){
    $_SESSION['carrito']=$arregloNuevo;
    unset($_SESSION['idPro']);
    header('Location: ../../carrito.php');
}else{
    //quiere decir que el registro a eliminar es el unico que habia
    unset($_SESSION['carrito']);
    unset($_SESSION['idPro']);
    header('Location: ../../carrito.php');
}
?>