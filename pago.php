<?php include_once 'templates/header.php';?> 
        <?php
            session_start();
            require_once('includes/funciones/bD_coneccion.php');
            if(isset($_SESSION['carrito'])){ 
                //Si existe el carrito y el id producto  
                if(isset($_SESSION['idPro'])){
                    $arreglo =$_SESSION['carrito'];
                    $idProducto =$_SESSION['idPro'];
                    $band=false;
                    $numero=0;
                    for($i=0;$i<count($arreglo);$i++){
                        if($arreglo[$i]['id'] == $idProducto){
                            $band=true;
                            $numero=$i;
                        }
                    }                  
                    ///Si el id se encontro
                    if($band == true){
                        $arreglo[$numero]['cantidad'] +=$_POST["cantidad"];
                        $_SESSION['carrito']=$arreglo;
                    }else{
                        //Si no se encontro el producto
                        $idProducto =$_SESSION['idPro'];
                        try{
                            $sql ="SELECT producto.idProducto, producto.pro_Nombre, producto.pro_Precio, producto.pro_DescripcionCorta, producto.pro_RutaImagen
                            FROM producto WHERE producto.idProducto = $idProducto;";
                            $resultado = $coneccion->query($sql);
                            $fila = mysqli_fetch_row($resultado);
                            $nombre = $fila[1];
                            $precio = $fila[2];
                            $descCorta =$fila[3];
                            $imagen =$fila[4];
                            $talla =$_POST["talla"];
                            $cantidad =$_POST["cantidad"];
                            $arreglo[] = array(
                                'id'=> $_SESSION['idPro'],
                                'nombre'=> $nombre,
                                'precio'=> $precio,
                                'descriCorta'=> $descCorta,
                                'talla'=>$talla,
                                'imagen'=> $imagen,
                                'cantidad'=>$cantidad
                            );
                            array_push($arreglo,$arregloNuevo);
                            $_SESSION['carrito']= $arreglo;
    
                        }catch(\Exception $e){
                            echo $e->getMessage();
                        }
                    }   
                }
            }else{
                //Si no exite el carrito pero si el producto
                if(isset($_SESSION['idPro'])){
                    $idProducto =$_SESSION['idPro'];
                    //echo"<h2>Esta2 $idProducto</h2>";
                    try{
                        $sql ="SELECT producto.idProducto, producto.pro_Nombre, producto.pro_Precio, producto.pro_DescripcionCorta, producto.pro_RutaImagen
                        FROM producto WHERE producto.idProducto = $idProducto;";
                        $resultado = $coneccion->query($sql);
                        $fila = mysqli_fetch_row($resultado);
                        $nombre = $fila[1];
                        $precio = $fila[2];
                        $descCorta =$fila[3];
                        $imagen =$fila[4];
                        $talla =$_POST["talla"];
                        $cantidad =$_POST["cantidad"];
                        $arreglo[] = array(
                            'id'=> $_SESSION['idPro'],
                            'nombre'=> $nombre,
                            'precio'=> $precio,
                            'descriCorta'=> $descCorta,
                            'talla'=>$talla,
                            'imagen'=> $imagen,
                            'cantidad'=>$cantidad
                        );
                        $_SESSION['carrito']= $arreglo;

                    }catch(\Exception $e){
                        echo $e->getMessage();
                    }
                }else{
                    ///Si no existe el id producto
                    try{
                        /*/if(isset($_SESSION['username'])){
                            $correo = $_SESSION['username'];
                            
                            $sqls = "SELECT idUsuario FROM usuario WHERE use_Correo LIKE '$correo';";
                            $c = mysqli_query($coneccion,$sqls);
                            $fila = mysqli_fetch_row($c);
                            
                            $sqli ="SELECT idProducto FROM pedidos WHERE idCliente = '$fila[0]';";
                            $cc = mysqli_query($coneccion,$sqli);
                            //$fila2 = mysqli_fetch_row($cc);
                            $fila2 = mysqli_fetch_row($cc);
                            ///FALTA                  
                           
                            for ($i=0; $i <2 ; $i++) {
                                //echo $fila2[$i];
                                //echo " aaa $sqli";
                            }*/
                            //$_SESSION['carrito']= $arreglo2;
                            //$_SESSION['idPro'] =$productoId;
                    }catch(\Exception $e){
                        echo $e->getMessage();
                    }
                } 
            }
            
        ?>
           <?php
                try{
                    require_once('includes/funciones/bD_coneccion.php');
                    if(isset($_SESSION['username'])){
                        $correo = $_SESSION['username'];
                            $sqls = "SELECT idUsuario as id,idPago as user FROM usuario WHERE use_Correo LIKE '$correo';";
                            $c = mysqli_query($coneccion,$sqls);
                            $array = mysqli_fetch_array($c);
                            $pago = $array['user'];
                            $pagoID = $array['id'];   
                        // echo $pago;
                        $sql = "SELECT * FROM pago WHERE idPago LIKE '$pago';";
                        $resultado = $coneccion->query($sql);
                        
                        // echo"<h2>Si existe $correo</h2>";
                    }else{
                        //echo"<h2>No existe</h2>";
                    }
                }catch(\Exception $e){
                    echo $e->getMessage();
                }
            ?>
            <?php 
                $datosP  = array();
                while($eventosP = $resultado->fetch_assoc()){

                    $codigoP =$eventosP['idTipoPago'];
                    $eventosP = array(
                        'id'=>$eventosP['idPago'],
                        'nombre'=>$eventosP['pag_NombreCompleto'],
                        'numerosT'=>$eventosP['pag_NumeroTarjeta'],
                        'fecha'=>$eventosP['pag_Fecha'],
                        'tipo'=>$eventosP['idTipoPago']
                    );
                    $datosP[$codigoP][] = $eventosP;
            ?>    
            <?php } ///fin while            ?>    
    <!---Detalles del Carrito-->
        <div class="mini-contenedor cart-peg">
            <table>
                <tr>
                    <th><h2>Pago</h2></th>
                    <th><h2>Resumen del pedido</h2></th>
                </tr>  
                <tr>
                    <td>
                    <form action="includes\funciones\sav_Upd_Pago.php" method="POST">
                            <?php 
                            if(isset($datosP[$codigoP])){ 
                                foreach($datosP as $codigoP => $lista){ ?>
                                <?php foreach($lista as $evenP){ ?>  
                                        <?php $arr= explode( '-', $evenP['fecha']);?>
                                        <select name="usr_Pago">
                                            <option>Tipo de tarjeta</option>
                                            <option value="1" <?php if($evenP['tipo'] == "1"){echo("selected");};?>>Debito</option>
                                            <option value="2" <?php if($evenP['tipo'] == "2"){echo("selected");};?>>Credito</option>
                                            <option value="3" <?php if($evenP['tipo'] == "3"){echo("selected");};?>>PayPal</option>
                                        </select>
                                        <input type="text" placeholder="Nombre completo" name="usr_Nombre" value="<?php echo $evenP['nombre'];?>">
                                        <input type="number_format" placeholder="Numero tajeta" name="usr_NumeroT" value="<?php echo $evenP['numerosT'];?>">
                                        <select name="usr_Dia">
                                            <option value="1" <?php if($arr[2] == "1"){echo("selected");};?>>1</option>
                                            <option value="2" <?php if($arr[2] == "2"){echo("selected");};?>>2</option>
                                            <option value="3" <?php if($arr[2] == "3"){echo("selected");};?>>3</option>
                                        </select>
                                        <select name="usr_Mes">
                                            <option value="1" <?php if($arr[1] == "1"){echo("selected");};?>>Enero</option>
                                            <option value="2" <?php if($arr[2] == "2"){echo("selected");};?>>Febrero</option>
                                            <option value="3" <?php if($arr[1] == "3"){echo("selected");};?>>Marzo</option>
                                        </select>
                                        <select name="usr_año">
                                            <option value="2020" <?php if($arr[0] == "2020"){echo("selected");};?>>2020</option>
                                            <option value="2021" <?php if($arr[0] == "2021"){echo("selected");};?>>2021</option>
                                            <option value="2022" <?php if($arr[0] == "2022"){echo("selected");};?>>2022</option>
                                        </select>
                                        <input type="password" placeholder="NIP">
                                        <?php $_SESSION['idpago'] = $pagoID; ?>
                                        <button type="submit" class="btn">Guardar</button>
                                        <?php }?>
                                <?php } ?>
                            <?php }else{ ?> 
                                        <select name="usr_Pago">
                                            <option>Tipo de tarjeta</option>
                                            <option value="1">Debito</option>
                                            <option value="2">Credito</option>
                                            <option value="3">PayPal</option>
                                        </select>
                                        <input type="text" placeholder="Nombre completo" name="usr_Nombre">
                                        <input type="number_format" placeholder="Numero tajeta" name="usr_NumeroT">
                                        <select name="usr_Dia">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3" >3</option>
                                        </select>
                                        <select name="usr_Mes">
                                            <option value="1">Enero</option>
                                            <option value="2">Febrero</option>
                                            <option value="3">Marzo</option>
                                        </select>
                                        <select name="usr_año">
                                            <option value="2020">2020</option>
                                            <option value="2021">2021</option>
                                            <option value="2022">2022</option>
                                        </select>
                                        <input type="password" placeholder="NIP">
                                        <?php $_SESSION['idpago'] = $pagoID; ?>
                                        <button type="submit" class="btn">Agregar</button>                  
                            <?php }?>                 
                    </form>
                </td> 
                
                <td>
                    <?php 
                    if(isset($_SESSION['carrito'])){ 
                        $arregloCarrito =$_SESSION['carrito'];
                        for($i=0;$i<count($arregloCarrito);$i++){?> 
                            <div class="cart-info-a">
                            <img src = "<?php echo $arregloCarrito[$i]['imagen'];?>">
                                <div>
                                    <a><?php echo $arregloCarrito[$i]['nombre']; ?></a>
                                    <br>
                                    <a><?php echo $arregloCarrito[$i]['descriCorta']; ?></a>
                                    <br>
                                    <a>Talla: <?php echo $arregloCarrito[$i]["talla"] ;?></a>
                                    <br>
                                    <small>cantidad:<?php echo $arregloCarrito[$i]['cantidad']; ?></small>
                                    <br>
                                    <a>Precio: $<?php echo $arregloCarrito[$i]['precio']; ?></a>
                                    <br>
                                    <br>

                                </div>
                            </div>        
                <?php } } ?> 
                </td>
            </tr>
            </table>
            <div class="total-precio">
                <table>
                       
                    <tr>
                        <td>Gastos de envio</td>
                        <td>$90.00</td>
                    </tr>
                    <tr>
                        <td>Total</td>
                        <?php 
                        if(isset($_SESSION['carrito'])){ 
                             $arregloCarrito =$_SESSION['carrito'];
                            for($i=0;$i<count($arregloCarrito);$i++){
                         $total += $arregloCarrito[$i]['precio'] * $arregloCarrito[$i]['cantidad'];
                         
                        }}?>
                        
                        <td>$<?php echo ($total)+17+90 ; ?></td>
                    </tr>
                    
                 
                    <tr>
                        <td>
                            <?php 
                            $s =date_default_timezone_get();
                                date_default_timezone_set ( $s );
                                    if(isset($_SESSION['carrito'])){ 
                                        $arregloIn =$_SESSION['carrito'];
                                        for($i=0;$i<count($arregloIn);$i++){
                                            $pid = $arregloIn[$i]['id'];
                                                //Fla si exite pago 
                                                $correo = $_SESSION['username'];
                                                $sqls = "SELECT idUsuario, idPago FROM usuario WHERE use_Correo LIKE '$correo';";
                                                $c = mysqli_query($coneccion,$sqls);
                                                $fila = mysqli_fetch_row($c);
                                                
                                                $fecha = date("y-m-d");
                                                $hora = date("H:i:s");
                                                $usuario=$fila[0];
                                                $produc=$pid;
                                                $pagoid=$fila[1];
                                                $fechaH = $fecha." ".$hora;
                                                $tallaE =$arregloIn[$i]["talla"];
                                                $cantidad =$arregloIn[$i]["cantidad"];
                                                $insert="INSERT INTO pedidos (idPedidos, ped_Fecha, idCliente, idProducto, idPago, ped_cantidad_producto,ped_Talla_producto) 
                                                VALUES (NULL, '$fechaH', '$usuario', '$produc', '$pagoid','$cantidad','$tallaE');";
                                                $inser =mysqli_query($coneccion,$insert);
                                                if($inser){
                                                    //echo "Se inserto un valor ";
                                                    $sqlpedi = "SELECT MAX(idPedidos) AS id FROM pedidos;";
                                                    $cons = mysqli_query($coneccion,$sqlpedi);
                                                    $dato = mysqli_fetch_row($cons);
                                                    echo "<form  method=POST action=detalles-Compra.php?id=$dato[0]&num=".$dato[0]."A".$produc."z".$cantidad."&fecha=$fechaH>";
                                                    unset($_SESSION['carrito']);
                                                    unset($_SESSION['idPro']);
              
                                                }else{
                                                    // Foram correcta echo " <form  method=POST action=pago.php>";
                                                    echo "<form  method=POST action=pago.php>";
                                                       
                                                    echo "<h2> error el pago no es correcto<h2>  ";
                                                }                                   
                                           
                                        }
                                    }                     
                                ?> 
                                <button type="submit"class="btnPagar" >Pagar</button>
                            </form>
                        </td>
                    </tr> 
                </table>
            </div>
            
        </div>       
       
    <?php include_once 'templates/footer.php';?> 

<!---js---Toggel menu---->
<script src="js\toggel.js"></script>
    
</body>
</html>

