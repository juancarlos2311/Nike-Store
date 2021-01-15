<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Nike | eCommerce</title>
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/slick.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,900;1,400;1,500&display=swap" rel="stylesheet">
</head>
<body>

    <!--Cabecera-->
    <div class="header">
        <div class="container">
            <div class="navbar">
                <div class="logo">
                    <a href="index.php">
                        <img src="images/logo-nike.png" width="125px">
                    </a>
                </div>
                <!--Menu-->
                <nav>
                    <?php if(isset($_SESSION['adm'])){?>
                        <ul id="MenuItems">
                            <li><a href="index.php"><img src="images/house.svg" width="30px" height="25px"></a></li>
                            <li><a href="productos.php"><img src="images/package.svg" width="30px" height="25px"></img></a></li>
                            <li><a href="acercade.php"><img src="images/bookmark-1.svg" width="30px" height="25px"></a></li>
                            <li><a href="tiendas.php"><img src="images/phone.svg" width="30px" height="25px"></a></li>
                            <li><a href="admin.php"><img src="images/cloud-upload.svg" width="30px" height="25px"></img></a></li>
                            <li><a href="cuenta.php"><img src="images/cogwheel-1.svg" width="30px" height="25px"></img></a></li>
                        </ul>
                    <?php }else{?>
                    <ul id="MenuItems">
                        <li><a href="index.php"><img src="images/house.svg" width="30px" height="25px"></a></li>
                        <li><a href="productos.php"><img src="images/package.svg" width="30px" height="25px"></img></a></li>
                        <li><a href="acercade.php"><img src="images/bookmark-1.svg" width="30px" height="25px"></a></li>
                        <li><a href="tiendas.php"><img src="images/phone.svg" width="30px" height="25px"></a></li>
                        <li><a href="cuenta.php"><img src="images/cogwheel-1.svg" width="30px" height="25px"></img></a></li>
                    </ul>
                    </nav>
                <a href="carrito.php">
                    <img src="images/shopping-cart-1.svg" width="30px"height="30px">
                </a>
                <?php }?>       
                   
               
                <img src="images/menu.png"class ="menu-icon" onclick="menutoggle()">
            </div>
       

            
            <!--Texto e imagen de la cabecera -->
            <div class="filas">
                <div class="col-2">
                    <h1>Dale estilo <br> tu forma de vestir!</h1>
                    <p>Libertad para crear tu propio estilo.<br>
                    Te presentamos una nueva coleccion de zapatillas<br>
                    que combianan con todo. Tu imaginacion no tine un limite. 
                    </p>
                    <a href="productos.php" class="btn">Explorar &#8594;</a>
                </div>    
                <div class="col-2">
                    <img src="images/fondo-nike.png">
                </div>
                
            </div> 
            
        </div>
    </div>
    <!---Categorias-->
    <div class="for_slick_slider multiple-items">
        
        <div class = "items">
            <img src="images/categora-nike-1.jpg" alt="">
        </div>
        <div class = "items">
            <img src="images/categora-nike-2.jpg" alt="">
        </div>
        <div class = "items">
            <img src="images/categora-nike-3.jpg" alt="">
        </div>
        <div class = "items">
            <img src="images/categora-nike-1.jpg" alt="">
        </div>
        <div class = "items">
            <img src="images/categora-nike-2.jpg" alt="">
        </div>
        <div class = "items">
            <img src="images/categora-nike-3.jpg" alt="">
        </div>
        <div class = "items">
            <img src="images/categora-nike-1.jpg" alt="">
        </div>
        <div class = "items">
            <img src="images/categora-nike-2.jpg" alt="">
        </div>
        <div class = "items">
            <img src="images/categora-nike-3.jpg" alt="">
        </div>
    </div>
    <!---Categorias
    <div class="categorias">
        <div class="mini-contenedor">
            <div class="filas">
                <div class="col-3">
                    <img src="images/categora-nike-1.jpg" >
                </div>
                <div class="col-3">
                    <img src="images/categora-nike-2.jpg" >
                </div>
                <div class="col-3">
                    <img src="images/categora-nike-3.jpg" >
                </div>
            </div>
        </div>
    </div>-->
    <!---Productos destacados-->
    <div class="mini-contenedor">
        <h2 class="titulo">Productos Destacados</h2>
        <?php include_once 'includes/funciones/featured-products.php';?> 
        <h2 class="titulo">Ultimos Productos</h2>
        <?php
            try{
                require_once('includes/funciones/bD_coneccion.php');
                $sql = "SELECT * FROM producto LIMIT 8";
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
                    'id' =>$eventos['idProducto'],
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
    </div>
    <!---OFERTASSs-->
    <div class="ofertas">
        <div class="mini-contenedor">
            <div class="filas">
                <div class="col-2">
                    <img src="images/exclusivo-apple-nike.png" class="oferta-img">
                </div>
                <div class="col-2">
                    <p>Exclusividad entre nustros productos</p>
                    <h1>Apple Watch Nike </h1>
                    <small>La caja de aluminio es ligera y está hecha de aluminio aerospacial 100% reciclado.
                        <br><br>La correa deportiva Nike está hecha de fluoroelastómero de alto rendimiento 
                        con perforaciones moldeadas por compresión para ofrecer una mejor ventilación.<br>
                    </small> 
                    <a href=""class="btn">Comprar &#8594;</a>
                </div>
            </div>
        </div>
    </div>
    <!----Contactanos-->
    <div class="testimoniales">
        <h2 class="titulo">Tiendas</h2>
        <div class="mini-contenedor">
            <div class="filas">
            <div class="col-3">
                    <p>Avenida Universidad 2229 <br>Col. San José Del Arenal <br>Aguascalientes, 20130, MX</p>
                    <a href="tiendas.php"><img src="images/tienda-1.png"></a>
                    <h3>Nike Factory Store - Aguascalientes</h3>
                </div>
                <div class="col-3">
                    <p>Centro Factory Outlet Del Bajio <br>Blvd. Aeropuerto 841 <br>Predio Santa Anita <br>León, Guanajuato, 37295, MX</p>
                    <a href="tiendas.php"><img src="images/tienda-2.png"></a>
                    <h3>Nike Factory Store - Leon</h3>
                </div>
                <div class="col-3">
                    <p>Antea Lifestyle Center Paseo De La República 12401, Local <br>124,125 Y 126. EJIDO De Jurica, Santiago De Querétaro, Qro., <br>México <br>Querétaro, 76127, MX</p>
                    <a href="tiendas.php"><img src="images/tienda-3.png"></a>
                    <h3>Nike Antea Queretaro</h3>
                </div>
            </div>
        </div>
    </div>
    <!----Categorias-->
    <div class="categorias">
        <div class="mini-contenedor">
            <div class="filas">
                <div class="col-5">
                    <img  src="images/logo-nike-sb.png" alt="">
                </div>
                <div class="col-5">
                    <img src="images/logo-nike.png" alt="">
                </div>
                <div class="col-5">
                    <img src="images/logo-nike-run.png" alt="">
                </div>
                <div class="col-5">
                    <img src="images/logo-jordan.png" alt="">
                </div>
            </div>
        </div>
    </div>

    <?php include_once 'templates/footer.php';?> 


<!---js---Toggel menu------->
    <script src="js/toggel.js"></script>
    <script src = "js/jquery-3.3.1.min.js"></script>
    <script src = "js/slick.min.js"></script>
    <script src = "js/custom.js"></script>
    <script>
        var btn = document.getElementsByClassName("botn");

        for(let i=0;i<btn.length;i++){
            btn[i].addEventListener('click',function(){
                let current = document.getElementsByClassName("activo");
                current[0].className = current[0].className.replace("activo","");
                this.className +=" activo";
            });
        }
    </script>
</body>
</html>
