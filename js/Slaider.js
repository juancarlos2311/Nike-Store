var DetallesForm = document.getElementById("DetallesForm2");
var PagoForm = document.getElementById("PagoFrom2");
var PedidosForm = document.getElementById("PedidosFrom2");
var DireccionForm = document.getElementById("DireccionFrom2");
var indicador = document.getElementById("Indicador2");
function detalles(){
    DetallesForm.style.transform = "translateX(0px)";
    PagoForm.style.transform = "translateX(-300px)";
    PedidosForm.style.transform = "translateX(-300px)";
    DireccionForm.style.transform = "translateX(-300px)";
    indicador.style.transform = "translateX(0px)";
}
function pago(){
    DetallesForm.style.transform = "translateX(600px)";
    PagoForm.style.transform = "translateX(450px)";
    PedidosForm.style.transform = "translateX(-300px)";
    DireccionForm.style.transform = "translateX(-300px)";
    indicador.style.transform = "translateX(100px)";
}
function pedidos(){
    DetallesForm.style.transform = "translateX(600px)";
    PagoForm.style.transform = "translateX(-300px)";
    PedidosForm.style.transform = "translateX(450px)";
    DireccionForm.style.transform = "translateX(-300px)";
    indicador.style.transform = "translateX(200px)";
}
function direccion(){
    DetallesForm.style.transform = "translateX(600px)";
    PagoForm.style.transform = "translateX(-300px)";
    PedidosForm.style.transform = "translateX(-300px)";
    DireccionForm.style.transform = "translateX(450px)";
    indicador.style.transform = "translateX(300px)";
}