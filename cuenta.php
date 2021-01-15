
<?php include_once 'templates/header.php';?> 

    <div class="cuenta-pagin">
        <div class="container">
            <div class="filas">
                <div class="col-2">
                    <div class="desde-contenedor">
                        <div class="desde-btn">
                            <samp onclick="entrar()">Entrar</samp>
                            <samp onclick="registrar()">Registrar</samp>
                            <hr id="Indicador">
                        </div>
                        <div>
                             <h2>Bienvenido</h2>
                            <?php
                                session_start();
                                if(isset($_SESSION['username'])){
                                    header("location: datos-usuario.php");
                                }else{
                                   // echo"no";
                                    //header("location: datos-usuario.php");
                                }   
                            ?>            
                        </div>
                        <form id="IniciarForm" method="POST">
                            <?php if(isset($_GET['error'])){
                                if($_GET['error'] = 1564582)?>
                                    <a id="mensaje2">
                                    <?php echo "Dato incorrectos";?>
                                    </a>
                            <?php }?>
                            <div class="form__div">
                                <input id ="correoUsuer" type="text" class="form__input" placeholder=" " name="usr_correo">
                                <label id ="labelCorroUsuer" for="" class="form__label" >Email</label>
                            </div>
                            <div class="form__div">
                                <input id ="passwordUser" type="password" class="form__input" placeholder=" " name="user_contraseña">
                                <label id ="labelpasswordUser" for="" class="form__label">Contraseña</label>
                            </div>

                            <input type="submit" class="btn" value="Entrar">
                           <!--- <input type="text" placeholder="Correo" name="usr_correo">
                            <input type="password" placeholder="contraseña"name="user_contraseña">
                            <button type="submit" class="btn" >Entrar</button>--->
                            <a href="">olvidaste tu contraseña?</a>
                            <br>
                            <a href="">Crea tu perfil como miembro de Nike y sé el primero en tener acceso a los mejores productos, la inspiración y la comunidad.</a>
                            
                        </form>
                        <form id="RegistrarFrom"  method="POST">
                            <a id="mensaje"></a>
                            <div class="form__div">
                                <input id ="correo" type="text" class="form__input" placeholder=" " name="usr_correor">
                                <label id ="labelCorreo" for="" class="form__label">Email</label>
                            </div>    
                            <div class="form__div">
                                <input id ="password" type="password" class="form__input" placeholder=" " name="user_contraseñar">
                                <label id ="labelContra" for="" class="form__label">Contraseña</label>
                            </div>
                            <div class="form__div">
                                <input id ="celular" type="text" class="form__input" placeholder=" " name="user_celular">
                                <label id ="labelCelular" for="" class="form__label">N Celular</label>
                            </div>
                            <div class="form__div">
                                <input id ="nombre" type="text" class="form__input" placeholder=" " name="user_nombre">
                                <label id ="labelNombre" for="" class="form__label">Nombre</label>
                            </div>
                            <div class="form__div">
                                <input id ="apellido" type="text" class="form__input" placeholder=" " name="user_apellido">
                                <label id ="labelApellido" for="" class="form__label">Apellidos</label>
                            </div>
                            <a onclick="entrar()">Ya tienes cuenta?</a>
                            <br>
                            <a href="">Crea tu perfil como miembro de Nike y sé el primero en tener acceso a los mejores productos</a>
                            
                            <button type="submit" class="btn" >Registrar</button>
                            <br>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>    
       
        
    <?php include_once 'templates/footer.php';?> 

<!---js---Toggel menu----->
    <script src="js\toggel.js"></script>
    <script>
        var LoginForm = document.getElementById("IniciarForm");
        var RegForm = document.getElementById("RegistrarFrom");
        var indicador = document.getElementById("Indicador");

        function registrar(){
            RegForm.style.transform = "translateX(0px)";
            LoginForm.style.transform = "translateX(0px)";
            indicador.style.transform = "translateX(100px)";
        }
        function entrar(){
            RegForm.style.transform = "translateX(300px)";
            LoginForm.style.transform = "translateX(300px)";
            indicador.style.transform = "translateX(0px)";
        }
    </script>
    <script src="js\validaciones.js"> </script>
    

</body>
</html>