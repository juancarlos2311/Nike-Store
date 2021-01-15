        <?php
            try{
                require_once('includes/funciones/bD_coneccion.php');
               
                $sql = "SELECT * FROM producto LIMIT 4";
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
                    'descriCorta'=>$eventos['pro_DescripcionCorta']
                );
                $datos[$precio][] = $eventos;
        ?>    
        <?php } ///fin while            ?>
        <div class="filas">
            <?php 
                foreach($datos as $dinero => $lista){ ?>
                <?php foreach($lista as $even){?>
                    <div class="col-4">
                        <?php $idProducto = $even['id']; ?>
                        <a href="productos-descripcion.php?id=<?php echo $idProducto?>">
                        <img src="<?php echo $even['imagen'];?>">
                        </a>
                        <h3><?php echo $even['nombre'];?></h3>
                        <p><?php echo $even['descriCorta']; ?></p>
                        <p>$<?php echo $even['precio']; ?></p>
                    </div>    
                <?php } ?>
            <?php } ?> 
        </div>     