<?php include_once 'templates/header.php';?> 
        <!---Productos destacados-->
    <div class="mini-contenedor">
        <div class="filas filas-2">
            <h2>Todo los productos</h2>
            <form  method="POST" action="productos.php" >
                <select name="mi_select">
                    <option value="0">Todo</option>
                    <option value="1">Sudadera</option>
                    <option value="2">Calzado</option>
                    <option value="3">Camicetas</option>
                    <option value="4">Mallas</option>
                    <option value="5">Shorts</option>
                </select>
                <button type="submit"class="btn"><img src="images/search.svg"  width="25px" height="15px"></img></button>
            </form>
        </div>
       
        <?php include_once 'includes/funciones/products.php';?> 
        <!--div class="pagin-btn">
            <span >1</span>
            <span >2</span>
            <span >3</span>
            <span >4</span>
            <span >&#8594;</span--->
        </div> 
    </div>        
         
    <?php include_once 'templates/footer.php';?> 


<!---js---Toggel menu------->
<script src="js\toggel.js"></script>
    
</body>
</html>