<?php
            try{
                
                require_once('includes/funciones/bD_coneccion.php');
             
                $sql = "SELECT * FROM producto";
                $resultado = $coneccion->query($sql);                 
                
            }catch(\Exception $e){
                echo $e->getMessage();
            }
        ?>
        <?php 
            $datos  = array();
            while($eventos = $resultado->fetch_assoc()){
                $precio =$eventos['pro_Precio'];
                $eventos = array(
                    'id'=>$eventos['idProducto'],
                    'nombre'=>$eventos['pro_Nombre'],
                    'precio'=>$eventos['pro_Precio'],
                    'imagen'=>$eventos['pro_RutaImagen'],
                    'descriCorta'=>$eventos['pro_DescripcionCorta'],
                    'categoria'=>$eventos['idCategoria']
                );
                $datos[$precio][] = $eventos;
        ?>   
        <?php } ///fin while            ?>      
        <h2>ADMINISTRADOR</h2>
        <div class="filas">
                <div class="col-4">
                    <a href="detalles_productosAdmin.php?id=0">
                    <img src="images/add.jpg">
                    <h2>AGREGAR PRODUCTOS</h2>
                    </a>
                </div> 
                <div class="col-4">
                    <a href="detalles_productosAdmin.php?id=999">
                    <img src="images/removeNew.jpg">
                    <h2>EELIMINAR PRODUCTOS</h2>
                    </a>
                </div> 
            <?php 
                foreach($datos as $dinero => $lista){ ?>
                <?php foreach($lista as $even){?>
                    <div class="col-4">
                        <?php $idProducto = $even['id']; ?>
                        <a href="detalles_productosAdmin.php?id=<?php echo $idProducto?>">
                        <img src="<?php echo $even['imagen'];?>">
                        </a>
                        <h3><?php echo $even['nombre'];?></h3>
                        <p><?php echo $even['descriCorta']; ?></p>
                        <p>$<?php echo $even['precio']; ?></p>
                    </div>    
                <?php } ?>
            <?php } ?> 
        </div>    