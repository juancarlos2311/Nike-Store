<?php include_once 'templates/header.php';?> 
    
    <div class="ofertas2">
        <div class="mini-contenedor">
            <div class="filas">
                <div class="col-2">
                    <img src="images/acercadeInc.jpg" class="oferta-img">
                </div>
                <?php $id = $_GET['id']; 
                      $numero = $_GET['num'];
                      $fecha = $_GET['fecha'];  ?>
                <div class="col-2">
                    <h3>
                        Peido numero: <?php echo $id;?><br>
                        Numero de rastreo:<?php echo $numero;?><br>
                        Fecha pedido:<?php echo $fecha;?>
                    </h3>
                    <button onclick="imprimirPagina();">Imprimir</button>
                </div>
            </div>
        </div>
    </div>
        
    <?php include_once 'templates/footer.php';?> 

<!---js---Toggel menu--davWy!cTHRvVi*qZf%ZG----->

<script src="js\toggel.js"></script> 
<script src="js\imprimir.js"></script> 

</body>
</html>