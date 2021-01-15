        <?php
            try{
                //Se conecta
                require_once('includes/funciones/bD_coneccion.php');
                //Se obtine el id que se resive 
                $idProducto =($_GET['id']);
                //Se obtiene el id de las imagenes segun el id del producto
                $ids = "SELECT idImagen FROM producto WHERE idProducto LIKE $idProducto ";
                //Se hace e query
                $resIds = $coneccion->query($ids);
                 while($e = $resIds->fetch_assoc()){
                     $rid = $e['idImagen'];
                 }
                 $idTallas = "SELECT idTalla FROM producto WHERE idProducto LIKE $idProducto ";
                //Se hace e query
                $resIdsT = $coneccion->query($idTallas);
                 while($a = $resIdsT->fetch_assoc()){
                     $resT = $a['idTalla'];
                 }
                 //echo "$idProducto = $rid";
                //$sql ="CALL MOSTRAR_PRODUCTO(1,1)";
                $sql ="SELECT producto.idProducto, producto.pro_Nombre, producto.pro_Precio, producto.pro_RutaImagen, 
                producto.pro_DescripcionCorta, producto.pro_DescripcionLarga, imagenes.img_UrlImg2, imagenes.img_UrlImg3 , 
                imagenes.img_UrlImg4 , imagenes.img_UrlImg5, imagenes.img_UrlImg6, tallas.tal_talla1, tallas.tal_talla2, tallas.tal_talla3, tallas.tal_talla4, tallas.tal_talla5 
                FROM producto, imagenes, tallas WHERE producto.idProducto LIKE $idProducto AND imagenes.idImagen LIKE $rid AND tallas.idTalla =$resT;";
                $resultado = $coneccion->query($sql);
            
            }catch(\Exception $e){
                echo $e->getMessage();
            }
        ?>
        
        <?php //Se obtine el arreglo de la consulta
            $datos  = array();
            while($eventos = $resultado->fetch_assoc()){
                $precio =$eventos['pro_Precio'];
                $eventos = array(
                    'id' =>$eventos['idProducto'],
                    'nombre' =>$eventos['pro_Nombre'],
                    'precio' =>$eventos['pro_Precio'],
                    'imagen' =>$eventos['pro_RutaImagen'],
                    'descriCorta' =>$eventos['pro_DescripcionCorta'],
                    'descriLarga' =>$eventos['pro_DescripcionLarga'],
                    'img2' =>$eventos['img_UrlImg2'],
                    'img3' =>$eventos['img_UrlImg3'],
                    'img4' =>$eventos['img_UrlImg4'],
                    'img5' =>$eventos['img_UrlImg5'],
                    'img6' =>$eventos['img_UrlImg6'],
                    'talla1' =>$eventos['tal_talla1'],
                    'talla2' =>$eventos['tal_talla2'],
                    'talla3' =>$eventos['tal_talla3'],
                    'talla4' =>$eventos['tal_talla4'],
                    'talla5' =>$eventos['tal_talla5']
                );
                $datos[$precio][] = $eventos;
        ?>    
        <?php } ///fin while            ?>
        
        <div class="filas">    
            <?php 
                foreach($datos as $dinero => $lista){ ?>
                <?php foreach($lista as $even){?>
                    <div class="col-2">
                        <img src="<?php echo $even['imagen'];?>" width="100%" id="ProductoImag"><!--Imagen-->
                        <div class="mini-img-lista">
                            <div class="mini-img-col">
                                <img src="<?php echo $even['imagen'];?>" width="100%"class="mini-img"><!--Imagen-->
                            </div>                            
                            <div class="mini-img-col">
                                <img src="<?php echo $even['img2'];?>" width="100%"class="mini-img"><!--Imagen-->
                            </div>
                            <div class="mini-img-col">
                                <img src="<?php echo $even['img3'];?>" width="100%"class="mini-img"><!--Imagen-->
                            </div>
                            <div class="mini-img-col">
                                <img src="<?php echo $even['img4'];?>" width="100%"class="mini-img"><!--Imagen-->
                            </div> 
                        </div> 
                        <div class="mini-img-lista">
                            <div class="mini-img-col">
                                <img src="<?php echo $even['img5'];?>" width="100%"class="mini-img"><!--Imagen-->
                            </div>
                            <div class="mini-img-col">
                                <img src="<?php echo $even['img6'];?>" width="100%"class="mini-img"><!--Imagen-->
                            </div>
                            <div class="mini-img-col">
                                
                            </div>
                            <div class="mini-img-col">
                               
                            </div> 
                        </div>   
                    </div>
                    <?php
                        session_start();
                        if(isset($_SESSION['username'])){
                            $producto = $even['id'];
                           // echo $even["talla1"];
                        }
                    ?>
                    <div class="col-2">
                        <p><?php echo $even['descriCorta']; ?></p><!--Descripcion-->
                        <h1><?php echo $even['nombre'];?></h1><!--Nombre-->
                        <h3>$<?php echo $even['precio']; ?></h3><!--Precio-->
                    <?php
                        session_start();
                        if(isset($_SESSION['username'])){
                    ?>
                        <form action="carrito.php" method="POST">
                            <input class="inp" type="number" name="cantidad" value="1"><!--Catidad-->
                            
                            <select name="talla"><!--Talla-->
                                <option value =<?php echo $even["talla1"]; ?>><?php echo $even['talla1']; ?></option>
                                <option value =<?php echo $even["talla2"]; ?>><?php echo $even['talla2']; ?></option>
                                <option value =<?php echo $even["talla3"]; ?>><?php echo $even['talla3']; ?></option>
                                <option value =<?php echo $even["talla4"]; ?>><?php echo $even['talla4']; ?></option>
                                <option value =<?php echo $even["talla5"]; ?>><?php echo $even['talla5']; ?></option>
                            </select>
                            <?php 
                                //echo $producto;
                                session_start();
                                $_SESSION['idPro'] = "$producto";
                            ?>
                            <button type="submit" class="btn">Agregar</button>
                        </form>
                    <?php }else{   ?>
                        <form action="cuenta.php">
                            <input class="inp" type="number" name="cantidad" value="1"><!--Catidad-->
                            <select name="talla"><!--Talla-->
                                <option><?php echo $even['talla1']; ?></option>
                                <option><?php echo $even['talla2']; ?></option>
                                <option><?php echo $even['talla3']; ?></option>
                                <option ><?php echo $even['talla4']; ?></option>
                                <option ><?php echo $even['talla5']; ?></option>
                            </select>
                            <button type="submit" class="btn">Agregar</button>
                        </form>
                    <?php }?>
                        <h3>Detalles del producto</h3>
                        <br>
                        <p><?php echo $even['descriLarga']; ?></p>
                    </div>    
                <?php } ?>
            <?php } ?> 
        </div>