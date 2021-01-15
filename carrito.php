<?php include_once 'templates/header.php';?> 
        <?php
            session_start();
            require_once('includes/funciones/bD_coneccion.php');
            if(isset($_SESSION['carrito'])){ 
                //Si existe el carrito y el id producto  
                if(isset($_SESSION['idPro'])){
                    $arreglo =$_SESSION['carrito'];
                    $idProducto =$_SESSION['idPro'];
                    $idTalla =$_POST["talla"];;
                    $band=false;
                    $numero=0;
                    for($i=0;$i<count($arreglo);$i++){
                        if($arreglo[$i]['id'] == $idProducto){
                            if($arreglo[$i]['talla'] == $_POST["talla"]){
                                $band=true;
                                $numero=$i;
                            }
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
                            $arregloNuevo = array(
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
                    
                } 
            }
            
        ?>
        
    <!---Detalles del Carrito-->
        <div class="mini-contenedor cart-peg">
            <table>
                <tr>
                    <th><h2>Bola de compras</h2></th>
                    <th><h2>Resumen</h2></th>
                </tr>
            <?php 
                //foreach($datos as $dinero => $lista){ 
                if(isset($_SESSION['carrito'])){ 
                    $arregloCarrito =$_SESSION['carrito'];
                    for($i=0;$i<count($arregloCarrito);$i++){?> 
                <tr>
                    <td>
                        <div class="cart-info">
                        <img src = "<?php echo $arregloCarrito[$i]['imagen'];?>">
                            <div>
                                <p><h3><?php echo $arregloCarrito[$i]['nombre']; ?></h3></p>
                                <p><?php echo $arregloCarrito[$i]['descriCorta']; ?></p>
                                <small>Talla: <?php echo $arregloCarrito[$i]["talla"];?></small>
                                <br>
                                <small>cantidad: <input type="number" value=<?php echo $arregloCarrito[$i]['cantidad']; ?>></small>
                                <br>
                                <a>Precio: $<?php echo $arregloCarrito[$i]['precio']; ?></a>
                                <br>
                                <form method="POST"action="includes/funciones/eliminar-producto.php?id=<?php  echo $arregloCarrito[$i]['id'];?>" >
                                    <button type="submit" class="btn">Eliminar</button>
                                </form>
                                <!--<a href="" class = "Eliminar" data-id = "" >Remover</a>-->
                            </div>
                        </div>        
                    </td>
                    <td>SubTotal</td>
                    <td>$<?php echo $arregloCarrito[$i]['precio'] * $arregloCarrito[$i]['cantidad'];?></td>
                     <?php $total += $arregloCarrito[$i]['precio'] * $arregloCarrito[$i]['cantidad'];?>
                </tr>
            <?php } } ?>
                        
            </table>
            <div class="total-precio">
                <table>
                    <tr>
                        <td>Gastos de envio</td>
                        <td>$90.00</td>
                    </tr>
                    <tr>
                        <td>Total</td>
                        <td>$<?php echo ($total)+17+90 ; ?></td>
                    </tr>
                    <tr>
                        <td>
                                <?php 
                                    if(isset($_SESSION['idPro'])){
                                        echo "<form  method=POST action=compra.php >";
                                        $_SESSION['carrito'];
                                    }else{
                                        echo "<form action=productos.php>";
                                    }
                                ?>
                                <button type="submit"class="btnPagar">Comprar</button>
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




