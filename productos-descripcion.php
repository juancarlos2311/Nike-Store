<?php include_once 'templates/header.php';?> 
   
    <!---Detalles del producto-->
    <div class="mini-contenedor producto-solo">
        <?php include_once 'includes/funciones/details-products.php';?> 
        
    </div>

    <div class="mini-contenedor">
        <div class="filas filas-2">
            <h2>Productos Relacionados</h2>
            <a href="productos.php">Ver mas</a>
        </div>
    </div>
    <!---Productos Destacados-->
    <div class="mini-contenedor">
        <?php include_once 'includes/funciones/featured-products.php';?> 

    </div>        
       
        
    <?php include_once 'templates/footer.php';?> 


<!---js---Toggel menu------->
<script src="js\toggel.js"></script>

<!---js-----Cambio e imagenes-----> 
<script>
    var ProductoImag = document.getElementById("ProductoImag");
    var cambioImg = document.getElementsByClassName("mini-img");

    cambioImg[0].onclick =function(){
        ProductoImag.src = cambioImg[0].src;
    }
    cambioImg[1].onclick =function(){
        ProductoImag.src = cambioImg[1].src;
    }
    cambioImg[2].onclick =function(){
        ProductoImag.src = cambioImg[2].src;
    }
    cambioImg[3].onclick =function(){
        ProductoImag.src = cambioImg[3].src;
    }
    cambioImg[4].onclick =function(){
        ProductoImag.src = cambioImg[4].src;
    }
    cambioImg[5].onclick =function(){
        ProductoImag.src = cambioImg[5].src;
    }
    cambioImg[6].onclick =function(){
        ProductoImag.src = cambioImg[6].src;
    }
</script>   

</body>
</html>