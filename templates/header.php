<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Nike | eCommerce</title>
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/estilos2.css">
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
        </div>
    </div>
          