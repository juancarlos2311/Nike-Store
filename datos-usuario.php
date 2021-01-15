<?php include_once 'templates/header.php';?>
        <div class="cuenta-pagin2">
        <div class="container">
            <div class="filas">
                <div class="col-2">
                    <div class="desde-contenedor2" id="Contenendor2">
                        <div class="desde-btn2">
                            <a onclick="detalles()"><img src="images/user-card.svg" width="95px" height="25px" ></img></a>
                            <a onclick="pago()"><img src="images/invoice.svg" width="95px" height="25px"></img></a>
                            <a onclick="pedidos()"><img src="images/check-square-1.svg" width="95px" height="25px"></img></a>
                            <a onclick="direccion()"><img src="images/envelope-1.svg" width="95px" height="25px"></img></a>
                            <?php
                             session_start();
                             if(isset($_SESSION['username'])){?>
                                <a href = 'includes/funciones/cerrarCuenta.php'>
                                    <img src="images/sign-out.svg" width="95px" height="25px"></img>
                                </a>
                             <?php }else{
                                header("location: ../../cuenta.php");
                             }
                        ?> 
                            <hr id="Indicador2">
                        </div>
                        
                        <!--Consulta-->
                        <?php
                            try{
                                require_once('includes/funciones/bD_coneccion.php');
                                if(isset($_SESSION['username'])){
                                    $correo = $_SESSION['username'];
                                   // echo"<h2>Si existe $correo</h2>";
                                    $sql = "SELECT * FROM usuario WHERE use_Correo LIKE '$correo';";
                                    $resultado = $coneccion->query($sql);
                                }else{
                                    //echo"<h2>No existe</h2>";
                                }
                            }catch(\Exception $e){
                                echo $e->getMessage();
                            }
                        ?>
                        <?php 
                            $datos  = array();
                            while($eventos = $resultado->fetch_assoc()){
                                $precio =$eventos['use_Celular'];
                                $eventos = array(
                                    'idUser'=>$eventos['idUsuario'],
                                    'nombre'=>$eventos['use_Nombre'],
                                    'apellido'=>$eventos['use_Apellidos'],
                                    'celular'=>$eventos['use_Celular'],
                                    'corro'=>$eventos['use_Correo'],
                                    'contrasena'=>$eventos['use_Contraseña']
                                );
                               $datos[$precio][] = $eventos;
                        ?>    
                        <?php } ///fin while            ?>
                        <form id="DetallesForm2" action="includes\funciones\sav_Upd_Usuario.php" method="POST">
                            <?php 
                                foreach($datos as $dinero => $lista){ ?>
                                <?php foreach($lista as $even){?>   
                                    <input type="text" placeholder="Nombre" name="user_nombre" value="<?php echo $even['nombre'];?>">
                                    <input type="text" placeholder="Apellido" name="user_apellido" value="<?php echo $even['apellido'];?>">
                                    <input type="text" placeholder="Celular" name="user_celular" value="<?php echo $even['celular'];?>">
                                    <input type="text" placeholder="Correo"  name="user_correo" value="<?php echo $even['corro'];?>">
                                    <input type="password" placeholder="Contraseña" name="user_contraseña" value="<?php echo $even['contrasena'];?>"> 
                                    <?php $_SESSION['id'] = $even['idUser'];?>     
                                <?php } ?>
                            <?php } ?> 
                            <button type="submit" class="btn">Guardar</button>
                        </form>         
                        
                        <?php
                            try{
                                require_once('includes/funciones/bD_coneccion.php');
                                if(isset($_SESSION['username'])){
                                    $correo = $_SESSION['username'];
                                     $sqls = "SELECT idUsuario as id,idPago as user FROM usuario WHERE use_Correo LIKE '$correo';";
                                     $c = mysqli_query($coneccion,$sqls);
                                     $array = mysqli_fetch_array($c);
                                     $pago = $array['user'];
                                     $pagoID = $array['id'];   
                                    // echo $pago;
                                    $sql = "SELECT * FROM pago WHERE idPago LIKE '$pago';";
                                    $resultado = $coneccion->query($sql);
                                    
                                   // echo"<h2>Si existe $correo</h2>";
                                }else{
                                    //echo"<h2>No existe</h2>";
                                }
                            }catch(\Exception $e){
                                echo $e->getMessage();
                            }
                        ?>
                        <?php 
                            $datosP  = array();
                            while($eventosP = $resultado->fetch_assoc()){

                                $codigoP =$eventosP['idTipoPago'];
                                $eventosP = array(
                                    'id'=>$eventosP['idPago'],
                                    'nombre'=>$eventosP['pag_NombreCompleto'],
                                    'numerosT'=>$eventosP['pag_NumeroTarjeta'],
                                    'fecha'=>$eventosP['pag_Fecha'],
                                    'tipo'=>$eventosP['idTipoPago']
                                );
                               $datosP[$codigoP][] = $eventosP;
                        ?>    
                        <?php } ///fin while            ?>      
                        <form id="PagoFrom2" action="includes\funciones\sav_Upd_Pago.php" method="POST">
                        <?php 
                        if(isset($datosP[$codigoP])){ 
                            foreach($datosP as $codigoP => $lista){ ?>
                            <?php foreach($lista as $evenP){ ?>  
                                    <?php $arr= explode( '-', $evenP['fecha']);?>
                                    <select name="usr_Pago">
                                        <option>Tipo de tarjeta</option>
                                        <option value="1" <?php if($evenP['tipo'] == "1"){echo("selected");};?>>Debito</option>
                                        <option value="2" <?php if($evenP['tipo'] == "2"){echo("selected");};?>>Credito</option>
                                        <option value="3" <?php if($evenP['tipo'] == "3"){echo("selected");};?>>PayPal</option>
                                    </select>
                                    <input type="text" placeholder="Nombre completo" name="usr_Nombre" value="<?php echo $evenP['nombre'];?>">
                                    <input type="number_format" placeholder="Numero tajeta" name="usr_NumeroT" value="<?php echo $evenP['numerosT'];?>">
                                    <select name="usr_Dia">
                                        <option value="1" <?php if($arr[2] == "1"){echo("selected");};?>>1</option>
                                        <option value="2" <?php if($arr[2] == "2"){echo("selected");};?>>2</option>
                                        <option value="3" <?php if($arr[2] == "3"){echo("selected");};?>>3</option>
                                    </select>
                                    <select name="usr_Mes">
                                        <option value="1" <?php if($arr[1] == "1"){echo("selected");};?>>Enero</option>
                                        <option value="2" <?php if($arr[2] == "2"){echo("selected");};?>>Febrero</option>
                                        <option value="3" <?php if($arr[1] == "3"){echo("selected");};?>>Marzo</option>
                                    </select>
                                    <select name="usr_año">
                                        <option value="2020" <?php if($arr[0] == "2020"){echo("selected");};?>>2020</option>
                                        <option value="2021" <?php if($arr[0] == "2021"){echo("selected");};?>>2021</option>
                                        <option value="2022" <?php if($arr[0] == "2022"){echo("selected");};?>>2022</option>
                                    </select>
                                    <input type="password" placeholder="NIP">
                                    <?php $_SESSION['idpago'] = $pagoID; ?>
                                    <button type="submit" class="btn">Guardar</button>
                                    <?php }?>
                            <?php } ?>
                        <?php }else{ ?> 
                                    <select name="usr_Pago">
                                        <option>Tipo de tarjeta</option>
                                        <option value="1">Debito</option>
                                        <option value="2">Credito</option>
                                        <option value="3">PayPal</option>
                                    </select>
                                    <input type="text" placeholder="Nombre completo" name="usr_Nombre">
                                    <input type="number_format" placeholder="Numero tajeta" name="usr_NumeroT">
                                    <select name="usr_Dia">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3" >3</option>
                                    </select>
                                    <select name="usr_Mes">
                                        <option value="1">Enero</option>
                                        <option value="2">Febrero</option>
                                        <option value="3">Marzo</option>
                                    </select>
                                    <select name="usr_año">
                                        <option value="2020">2020</option>
                                        <option value="2021">2021</option>
                                        <option value="2022">2022</option>
                                    </select>
                                    <input type="password" placeholder="NIP">
                                    <?php $_SESSION['idpago'] = $pagoID; ?>
                                    <button type="submit" class="btn">Agregar</button>                  
                         <?php }?>                 
                        </form>

                        <?php
                            try{
                                require_once('includes/funciones/bD_coneccion.php');
                                if(isset($_SESSION['username'])){
                                    $correo = $_SESSION['username'];
                                     $sqls = "SELECT idUsuario as user FROM usuario WHERE use_Correo LIKE '$correo';";
                                     $c = mysqli_query($coneccion,$sqls);
                                     $array = mysqli_fetch_array($c);
                                     $cliente = $array['user'];  
                                     
                                    $sql = "SELECT * FROM pedidos WHERE idCliente = '$cliente';";
                                    
                                    $resultado = $coneccion->query($sql);
                                }else{
                                    //echo"<h2>No existe</h2>";
                                }
                            }catch(\Exception $e){
                                echo $e->getMessage();
                            }
                        ?>
                        <?php 
                            $datosPedios  = array();
                            while($eventosPed = $resultado->fetch_assoc()){
                                $codigoPed =$eventosPed['dom_CodigoPostal'];
                                $eventosPed = array(
                                    'idPedido'=>$eventosPed['idPedidos'],
                                    'fecha'=>$eventosPed['ped_Fecha'],
                                    'producto'=>$eventosPed['idProducto'],
                                    'pago'=>$eventosPed['idPago']
                                );
                               $datosPedios[$codigoPed][] = $eventosPed;
                        ?> 
                        <?php } ///fin while            ?>    
                        <form id="PedidosFrom2">
                        <?php 
                                               
                        if(isset($datosPedios[$codigoPed])){
                            foreach($datosPedios as $codigoPed => $lista){ ?>
                                <?php foreach($lista as $evenPed){?>  
                                <div class="filasP">
                                    <div class="col-6">
                                     <a href="detalles-compra.php?id=<?php echo $evenPed['idPedido'];?>" cursor="pointer">
                                        <p>Numero de pedido: <?php echo $evenPed['idPedido'];?></p>
                                        <p><?php echo $evenPed['fecha'];?></p>
                                        <p> Nombre <?php echo $evenPed['producto'];?></p>
                                    </a>
                                    </div>
                                </div> 
                        <?php } ?>
                                <?php } ?> 
                            <?php }else{?>
                                <div class="filas">
                                <div class="col-4">
                                    <h3><a href="productos.php" cursor="pointer">Agregar pedidos</a></h3>
                                </div>    
                            </div>      
                            <?php }?>   
                        </form>

                        <?php
                            try{
                                require_once('includes/funciones/bD_coneccion.php');
                                if(isset($_SESSION['username'])){
                                    $correo = $_SESSION['username'];
                                    
                                     $sqls = "SELECT idUsuario as user FROM usuario WHERE use_Correo LIKE '$correo';";
                                     $c = mysqli_query($coneccion,$sqls);
                                     $array = mysqli_fetch_array($c);
                                     $cliente = $array['user'];  
                                     //echo $cliente; 
                                    $sql = "SELECT * FROM domicilio WHERE idCliente LIKE '$cliente';";
                                    
                                    $resultado = $coneccion->query($sql);
                                }else{
                                    //echo"<h2>No existe</h2>";
                                }
                            }catch(\Exception $e){
                                echo $e->getMessage();
                            }
                        ?>
                        <?php 
                            $datosD  = array();
                            while($eventosD = $resultado->fetch_assoc()){
                                $codigoD =$eventosD['dom_CodigoPostal'];
                                $eventosD = array(
                                    'domicilio'=>$eventosD['dom_Direccion'],
                                    'codigoP'=>$eventosD['dom_CodigoPostal'],
                                    'pais'=>$eventosD['dom_Pais'],
                                    'estado'=>$eventosD['dom_Estado'],
                                    'celular'=>$eventosD['don_Celular']
                                );
                               $datosD[$codigoD][] = $eventosD;
                        ?>    
                        <?php } ///fin while            ?>
                        <form id="DireccionFrom2"action="includes\funciones\sav_Upd_Domicilio.php" method="POST">
                        <?php                     
                            if(isset($datosD[$codigoD] )){ 
                                foreach($datosD as $codigoD => $lista){ ?>
                                    <?php foreach($lista as $evenD){?> 
                                        <input type="text" placeholder="Direccion" name="dom_Domicilio" value="<?php echo $evenD['domicilio'];?>">
                                        <input type="text" placeholder="Codigo postal" name="dom_CogogoPostal" value="<?php echo $evenD['codigoP'];?>">
                                        <select name="dom_Pais" >
                                            <option value ="Null">País</option>
                                            <option value ="Mexico" <?php if($evenD['pais'] == "Mexico"){echo("selected");};?>>Mexico</option>
                                            <option value ="Estados Unidos" <?php if($evenD['pais'] == "Estados Unidos"){echo("selected");}?>>Estados Unidos</option>
                                            <option value ="Brasil" <?php if($evenD['pais'] == "Brasil"){echo("selected");}?>>Brsail</option>
                                            <option value ="España" <?php if($evenD['pais'] == "España"){echo("selected");}?>>España</option>
                                        </select>
                                        <input type="text" placeholder="Estado"  name="dom_estado" value="<?php echo $evenD['estado'];?>">
                                        <input type="text" placeholder="Celular" name="dom_celular" value="<?php echo $evenD['celular'];?>">
                                        <button type="submit" class="btn">Guardar</button>
                                    <?php } ?>
                                <?php } ?> 
                            <?php }else{ ?> 
                                <input type="text" placeholder="Direccion" name="dom_Domicilio">
                                <input type="text" placeholder="Codigo postal" name="dom_CogogoPostal">
                                <select name="dom_Pais" >
                                    <option value ="Null">País</option>
                                    <option value ="Mexico" >Mexico</option>
                                    <option value ="Estados Unidos">Estados Unidos</option>
                                    <option value ="Brasil">Brsail</option>
                                    <option value ="España" >España</option>
                                </select>
                                <input type="text" placeholder="Estado"  name="dom_estado">
                                <input type="text" placeholder="Celular" name="dom_celular">
                                <button type="submit" class="btn">Agregar</button>
                            <?php }?>   
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>    
        
    <?php include_once 'templates/footer.php';?> 
<!---js---Toggel menu----->
<script src="js\toggel.js"></script>
<script src="js\Slaider.js"></script>
</body>
</html>