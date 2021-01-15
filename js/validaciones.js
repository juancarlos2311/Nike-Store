document.getElementById('correo').addEventListener('input', function() {
    campo = event.target;
    emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
    if (emailRegex.test(campo.value)) {
        document.getElementById('labelCorreo').style.color =  "#80868B";//Correo        
    } else {
        document.getElementById('labelCorreo').style.color =  "#e81a1a";
    }  
});
document.getElementById('password').addEventListener('input', function() {
    campo = event.target;
    valido = document.getElementById('mensaje');
    emailRegex = /^[a-zA-Z0-9]{8,16}$/i;
    if (emailRegex.test(campo.value)) {
        valido.innerText = "";
        document.getElementById('labelContra').style.color =  "#80868B";//Contrasena
        
    } else {
    valido.innerText = "Password a-zZ-a0-9 8-16";
    document.getElementById('labelContra').style.color =  "#e81a1a";
    }
    
});

document.getElementById('nombre').addEventListener('input', function() {
    campo = event.target;
    emailRegex = /^[a-zA-Z && \s]{8,50}$/i;
    if (emailRegex.test(campo.value)) {
        document.getElementById('labelNombre').style.color =  "#80868B";//Nobre
    } else {
        document.getElementById('labelNombre').style.color =  "#e81a1a";
    }
});  
document.getElementById('apellido').addEventListener('input', function() {  
    campo = event.target;
    a =document.getElementById('RegistrarFrom');
    emailRegex = /^[a-zA-Z && \s]{10,50}$/i;
    if (emailRegex.test(campo.value)) {
        document.getElementById('labelApellido').style.color =  "#80868B";//Apellido
    } else {
        document.getElementById('labelApellido').style.color =  "#e81a1a";
    a.action = "includes\funciones\registrar.php";
    }
});  

document.getElementById('correoUsuer').addEventListener('input', function() {
    campo = event.target;
    ini =document.getElementById('IniciarForm');
    emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
    contra = /^[a-zA-Z0-9]{8,16}$/i;
    if (emailRegex.test(campo.value)) {
        document.getElementById('labelCorroUsuer').style.color =  "#80868B";//Correcto 
        document.getElementById('passwordUser').addEventListener('input', function() {
            campo = event.target;
            valido = document.getElementById('mensaje2');  
            if (contra.test(campo.value)) {
                document.getElementById('labelpasswordUser').style.color =  "#80868B";//Correcto
                ini.action = "includes/funciones/logiar.php";    
            } else {
                valido.innerText = "Password a-zZ-a0-9 8-16";
                document.getElementById('labelpasswordUser').style.color =  "#e81a1a";//Incorrecto    
            }
        });       
    } else {
        document.getElementById('labelCorroUsuer').style.color =  "#e81a1a";
    }  
});
