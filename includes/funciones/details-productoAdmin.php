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
                     if($_GET['id'] == 0 || $_GET['id']==999){
                        $idProducto = "0";
                        $rid = "0";
                        $resT = "0";
                     }
                    $sql ="SELECT producto.idProducto, producto.pro_Nombre, producto.pro_Precio, producto.pro_RutaImagen, 
                    producto.pro_DescripcionCorta, producto.pro_DescripcionLarga,
                    imagenes.img_UrlImg2, imagenes.img_UrlImg3 , imagenes.img_UrlImg4 , imagenes.img_UrlImg5, imagenes.img_UrlImg6, 
                    tallas.tal_talla1, tallas.tal_talla2, tallas.tal_talla3, tallas.tal_talla4, tallas.tal_talla5,
                    categoria.cat_Nombre 
                    FROM producto, imagenes, tallas, categoria WHERE producto.idProducto LIKE $idProducto AND imagenes.idImagen LIKE $rid AND tallas.idTalla =$resT AND categoria.idCategoria =producto.idCategoria;";
                    $resultado = $coneccion->query($sql);

                    $sqlTodo="SELECT * FROM producto;";
                    $resul= $coneccion->query($sqlTodo);
                    
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
                    'talla5' =>$eventos['tal_talla5'],
                    'categoria'=>$eventos['cat_Nombre']
                );
                $datos[$precio][] = $eventos;
                          
        ?>    
        <?php } ///fin while            ?>
        
        <?php //Se obtine el arreglo de la consulta
            $datos2  = array();
            while($eventos2 = $resul->fetch_assoc()){
                $precio2 =$eventos2['pro_Precio'];
                $eventos2 = array(
                    'id' =>$eventos2['idProducto'],
                    'nombre' =>$eventos2['pro_Nombre'],
                    'precio' =>$eventos2['pro_Precio'],
                    'imagen' =>$eventos2['pro_RutaImagen'],
                    'descriCorta' =>$eventos2['pro_DescripcionCorta'],
                    'descriLarga' =>$eventos2['pro_DescripcionLarga']
                );
                $datos2[$precio2][] = $eventos2;
                          
        ?>    
        <?php } ///fin while            ?>
            <?php 
                if($_GET['id']==999){
                    echo"<form action=includes/funciones/admin-Delate.php method=POST>";
                }else{
                    echo "<form action=includes/funciones/admin-Upd.php method=POST>";
                }
            ?>    
                <div class="filas">  
                <?php 
                    foreach($datos as $dinero => $lista){ ?>
                    <?php foreach($lista as $even){?>
                        <div class="col-2">
                            <img src="<?php echo $even['imagen'];?>" width="100%" id="ProductoImag"><!--Imagen-->
                            <input name="img1" value="" id ="imge"></input>
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
                            }
                        ?>
                        <div class="col-2">
                    
                            <h2>Descripcion Corta:</h2>
                            <input name="descripcionC" value="<?php echo $even['descriCorta']; ?>"></input>
                            <h2>Nombre del Producto:</h2>
                            <input name="nombre" value="<?php echo $even['nombre']; ?>"></input>
                            <h2>Precio:</h2>
                            <input name="precio" value="<?php echo $even['precio']; ?>"></input>
                            <?php
                                session_start();
                                if(isset($_SESSION['username'])){
                            ?>
                            
                            
                            <h2>Categoria:</h2>                           
                            <select name="categoria"  ><!--Talla-->
                                <option value ="1"<?php  $SqlCategoria="SELECT cat_Nombre FROM categoria WHERE idCategoria ='1'";
                                        $result =  $coneccion->query($SqlCategoria); $fil =mysqli_fetch_row($result);
                                        if($even['categoria'] == $fil[0]){ echo "selected";} ?>> <?php  $SqlCategoria="SELECT cat_Nombre FROM categoria WHERE idCategoria ='1'";
                                        $result =  $coneccion->query($SqlCategoria); $fil =mysqli_fetch_row($result);
                                        if($even['categoria'] == $fil[0]){ echo $even['categoria'];}else{echo $fil[0];} ?>
                            </option>
                            <option value ="2" <?php  $SqlCategoria="SELECT cat_Nombre FROM categoria WHERE idCategoria ='2'";
                                        $result =  $coneccion->query($SqlCategoria); $fil =mysqli_fetch_row($result);
                                        if($even['categoria'] == $fil[0]){ echo "selected";} ?>> <?php  $SqlCategoria="SELECT cat_Nombre FROM categoria WHERE idCategoria ='2'";
                                        $result =  $coneccion->query($SqlCategoria); $fil =mysqli_fetch_row($result);
                                        if($even['categoria'] == $fil[0]){ echo "".$even['categoria'];}else{echo $fil[0];} ?>
                            </option>
                            <option value ="3" <?php  $SqlCategoria="SELECT cat_Nombre FROM categoria WHERE idCategoria ='3'";
                                        $result =  $coneccion->query($SqlCategoria); $fil =mysqli_fetch_row($result);
                                        if($even['categoria'] == $fil[0]){ echo "selected";} ?>> <?php  $SqlCategoria="SELECT cat_Nombre FROM categoria WHERE idCategoria ='3'";
                                        $result =  $coneccion->query($SqlCategoria); $fil =mysqli_fetch_row($result);
                                        if($even['categoria'] == $fil[0]){ echo "".$even['categoria'];}else{echo $fil[0];} ?>
                            </option>
                            <option value ="4" <?php  $SqlCategoria="SELECT cat_Nombre FROM categoria WHERE idCategoria ='4'";
                                        $result =  $coneccion->query($SqlCategoria); $fil =mysqli_fetch_row($result);
                                        if($even['categoria'] == $fil[0]){ echo "selected";} ?>> <?php  $SqlCategoria="SELECT cat_Nombre FROM categoria WHERE idCategoria ='4'";
                                        $result =  $coneccion->query($SqlCategoria); $fil =mysqli_fetch_row($result);
                                        if($even['categoria'] == $fil[0]){ echo "".$even['categoria'];}else{echo $fil[0];} ?>
                            </option>
                            <option value ="5" <?php  $SqlCategoria="SELECT cat_Nombre FROM categoria WHERE idCategoria ='5'";
                                        $result =  $coneccion->query($SqlCategoria); $fil =mysqli_fetch_row($result);
                                        if($even['categoria'] == $fil[0]){ echo "selected";} ?>> <?php  $SqlCategoria="SELECT cat_Nombre FROM categoria WHERE idCategoria ='5'";
                                        $result =  $coneccion->query($SqlCategoria); $fil =mysqli_fetch_row($result);
                                        if($even['categoria'] == $fil[0]){ echo "".$even['categoria'];}else{echo $fil[0];} ?>
                            </option>                   
                            </select>
                            <?php 
                                //echo $producto;
                                session_start();
                                $_SESSION['idPro'] = "$producto";
                            ?>
                            <h3>Detalles del producto:</h3>
                            <br>
                            <textarea name="descripcionL" class=estilotextarea2 rows="10" cols="50" font-size="14px"><?php echo $even['descriLarga']; ?></textarea>
                            <br>
                            <button type="submit" class="btn">ACTUALIZAR</button>
                        <?php }?>
                        </div>    
                    <?php } ?>
                <?php } ?> 
            <?php 
                if(!isset($datos[$precio])){
                    if($_GET['id']== 999){  ?>
                    <div class="mini-contenedor">
                            <h2>ELIMINAR UN PRODUCTO</h2>
                                <select name="mi_select">  
                                <?php foreach($datos2 as $dinero2 => $lista2){ ?>
                                    <?php foreach($lista2 as $even2){?>
                                        <option value="<?php echo $even2['id']?>"><?php echo $even2['nombre']?></option>
                                    <?php } } ?>    
                                </select>
                                <button type="submit"class="btn">Eliminar</button>
                            </form>
                    </div>
                    <?php } else{
                    ?>
                    <div class="col-2">   
                    <form action="includes/funciones/admin-Upd.php" method="POST">   
                        <div class="mini-img-lista">
                            <div class="mini-img-col">
                                <h2>Ruta imagen principal:</h2>
                                <input name="img1" value=" "></input>
                                <h2>Ruta imagen 2:</h2>
                                <input name="img2" value=" "></input>
                                <h2>Ruta imagen 3:</h2>
                                <input name="img3" value=" "></input>
                                <h2>Ruta imagen 4:</h2>
                                <input name="img4" value=" "></input>
                                <h2>Ruta imagen 5:</h2>
                                <input name="img5" value=" "></input>
                                <h2>Ruta imagen 6:</h2>
                                <input name="img6" value=" "></input>
                            </div>                              
                        </div> 
                    </div>
                    
                    <div class="col-2">
                        <h2>Descripcion Corta:</h2>
                        <input name="descripcionC" value=" "></input>
                        <h2>Nombre del Producto:</h2>
                        <input name="nombre" value=" "></input>
                        <h2>Precio:</h2>
                        <input name="precio" value=""></input>
                
                      
                        <h2>Categoria:</h2>                           
                            <select name="categoria"  ><!--Talla-->
                            <option value ="1"> <?php  $SqlCategoria="SELECT cat_Nombre FROM categoria WHERE idCategoria ='1'";
                                    $result =  $coneccion->query($SqlCategoria); $fil =mysqli_fetch_row($result);
                                    if($even['categoria'] == $fil[0]){ echo $even['categoria'];}else{echo $fil[0];} ?>
                           </option>
                           <option value ="2"> <?php  $SqlCategoria="SELECT cat_Nombre FROM categoria WHERE idCategoria ='2'";
                                    $result =  $coneccion->query($SqlCategoria); $fil =mysqli_fetch_row($result);
                                    if($even['categoria'] == $fil[0]){ echo "".$even['categoria'];}else{echo $fil[0];} ?>
                           </option>
                           <option value ="3" > <?php  $SqlCategoria="SELECT cat_Nombre FROM categoria WHERE idCategoria ='3'";
                                    $result =  $coneccion->query($SqlCategoria); $fil =mysqli_fetch_row($result);
                                    if($even['categoria'] == $fil[0]){ echo "".$even['categoria'];}else{echo $fil[0];} ?>
                           </option>
                           <option value ="4"> <?php  $SqlCategoria="SELECT cat_Nombre FROM categoria WHERE idCategoria ='4'";
                                    $result =  $coneccion->query($SqlCategoria); $fil =mysqli_fetch_row($result);
                                    if($even['categoria'] == $fil[0]){ echo "".$even['categoria'];}else{echo $fil[0];} ?>
                           </option>
                           <option value ="5"> <?php  $SqlCategoria="SELECT cat_Nombre FROM categoria WHERE idCategoria ='5'";
                                    $result =  $coneccion->query($SqlCategoria); $fil =mysqli_fetch_row($result);
                                    if($even['categoria'] == $fil[0]){ echo "".$even['categoria'];}else{echo $fil[0];} ?>
                           </option>                   
                            </select>
                        <h3>Detalles del producto:</h3>
                        <br>
                        <?php 
                            //echo $producto;
                            session_start();
                            $_SESSION['idPro'] = "0";
                        ?>
                        <textarea name="descripcionL" class=estilotextarea2 rows="10" cols="50" font-size="14px"></textarea>
                        <br>
                        <button type="submit" class="btn">AGRGAR </button>
                    </div>
                <?php  }  } ?>
            </form>
        </div>