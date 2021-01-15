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
                    
                        $sqls = "SELECT idUsuario as user FROM usuario WHERE use_Correo LIKE '$correo';";
                        $c = mysqli_query($coneccion,$sqls);
                        $array = mysqli_fetch_array($c);
                        $cliente = $array['user'];  
                        //echo $cliente; 
                    $sql = "SELECT * FROM domicilio WHERE idCliente LIKE '$cliente';";
                    
                    $resultado = $coneccion->query($sql);
                }else{
                    //echo"<h2>No existe</h2>";
                }
            }catch(\Exception $e){
                echo $e->getMessage();
            }
        ?>
        <?php 
            $datosD  = array();
            while($eventosD = $resultado->fetch_assoc()){
                $codigoD =$eventosD['dom_CodigoPostal'];
                $eventosD = array(
                    'domicilio'=>$eventosD['dom_Direccion'],
                    'codigoP'=>$eventosD['dom_CodigoPostal'],
                    'pais'=>$eventosD['dom_Pais'],
                    'estado'=>$eventosD['dom_Estado'],
                    'celular'=>$eventosD['don_Celular']
                );
                $datosD[$codigoD][] = $eventosD;
        ?>    
        <?php } ///fin while            ?>  
    <!---Detalles del Carrito-->
        <div class="mini-contenedor cart-peg">
            <table>
                <tr>
                    <th><h2>Domicilio</h2></th>
                    <th><h2>Resumen del pedido</h2></th>
                </tr> 
                <tr>
                    <td>
                    <form action="includes\funciones\sav_Upd_Domicilio.php" method="POST">
                        <?php                     
                            if(isset($datosD[$codigoD] )){ 
                                foreach($datosD as $codigoD => $lista){ ?>
                                    <?php foreach($lista as $evenD){?> 
                                        <input type="text" placeholder="Direccion" name="dom_Domicilio" value="<?php echo $evenD['domicilio'];?>">
                                        <input type="text" placeholder="Codigo postal" name="dom_CogogoPostal" value="<?php echo $evenD['codigoP'];?>">
                                        <select name="dom_Pais" >
                                            <option value ="Null">País</option>
                                            <option value ="Mexico" <?php if($evenD['pais'] == "Mexico"){echo("selected");};?>>Mexico</option>
                                            <option value ="Estados Unidos" <?php if($evenD['pais'] == "Estados Unidos"){echo("selected");}?>>Estados Unidos</option>
                                            <option value ="Brasil" <?php if($evenD['pais'] == "Brasil"){echo("selected");}?>>Brsail</option>
                                            <option value ="España" <?php if($evenD['pais'] == "España"){echo("selected");}?>>España</option>
                                        </select>
                                        <input type="text" placeholder="Estado"  name="dom_estado" value="<?php echo $evenD['estado'];?>">
                                        <input type="text" placeholder="Celular" name="dom_celular" value="<?php echo $evenD['celular'];?>">
                                        <button type="submit" class="btn">Guardar</button>
                                    <?php } ?>
                                <?php } ?> 
                            <?php }else{ ?> 
                                <input type="text" placeholder="Direccion" name="dom_Domicilio">
                                <input type="text" placeholder="Codigo postal" name="dom_CogogoPostal">
                                <select name="dom_Pais" >
                                    <option value ="Null">País</option>
                                    <option value ="Mexico" >Mexico</option>
                                    <option value ="Estados Unidos">Estados Unidos</option>
                                    <option value ="Brasil">Brsail</option>
                                    <option value ="España" >España</option>
                                </select>
                                <input type="text" placeholder="Estado"  name="dom_estado">
                                <input type="text" placeholder="Celular" name="dom_celular">
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
                            <form  method="POST" action="pago.php" >
                                <?php $_SESSION['carrito'];?>
                                <button type="submit"class="btnPagar">Continuar</button>
                            </form>
                        </td>
                    </tr> 
                </table>
            </div>
            
        </div>       

        
    <?php include_once 'templates/footer.php';?> 

<!---js---Toggel menu---->
<script src="js\toggel.js"></script>   <script>
        var MenuItems = document.getElementById("MenuItems");

        MenuItems.style.maxHeight ="0px";

        function menutoggle(){
            if(MenuItems.style.maxHeight == "0px"){
                MenuItems.style.maxHeight = "200px";
            }else{
                MenuItems.style.maxHeight = "0px";
            }
        }
    </script>
</body>
</html>

