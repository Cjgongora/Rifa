// OPCIONES PARA ESCOGER CUALQUIER CANTIDAD DE BOLETAS //

const precioUnitario = 4000;
const elmPrecioUnitario = document.getElementById("precioUnitario");
const elmCantidad = document.getElementById("cantidad");
const elmTotal = document.getElementById("total");
const currFormatter = new Intl.NumberFormat('es-CL', {
    style: 'currency',
    currency: 'CLP',
});

function calcularTotal() {
    let cantidad = elmCantidad.value;
    let total = 0;
    if (cantidad > 0) total = cantidad * precioUnitario;
    elmTotal.innerText = currFormatter.format(total);
}
elmPrecioUnitario.innerText = currFormatter.format(precioUnitario);
calcularTotal();

// OPCIONES RAPIDAS PARA ESCOGER LA CAMTIDAD DE BOLETAS ///

window.addEventListener("load", cargaPagina2);
function cargaPagina2() {
    var btn2 = document.getElementById("button2").addEventListener("click", cambiaValores2);
}
function cambiaValores2() {
    var inputValor2 = document.getElementById("cantidad");
    inputValor2.value = "3";
    var total2 = document.getElementById("total");
    total2.innerText = "$12.000";
}
window.addEventListener("load", cargaPagina3);
function cargaPagina3() {
    var btn3 = document.getElementById("button3").addEventListener("click", cambiaValores3);
}
function cambiaValores3() {
    var inputValor3 = document.getElementById("cantidad");
    inputValor3.value = "5";

    var total3 = document.getElementById("total");
    total3.innerText = "$20.000";
}
window.addEventListener("load", cargaPagina4);

function cargaPagina4() {
    var btn4 = document.getElementById("button4").addEventListener("click", cambiaValores4);
}

function cambiaValores4() {
    var inputValor4 = document.getElementById("cantidad");
    inputValor4.value = "6";
    var total4 = document.getElementById("total");
    total4.innerText = "$24.000";
}
window.addEventListener("load", cargaPagina5);
function cargaPagina5() {
    var btn5 = document.getElementById("button5").addEventListener("click", cambiaValores5);
}
function cambiaValores5() {
    var inputValor5 = document.getElementById("cantidad");
    inputValor5.value = "10";
    var total5 = document.getElementById("total");
    total5.innerText = "$40.000";
}
window.addEventListener("load", cargaPagina6);
function cargaPagina6() {
    var btn6 = document.getElementById("button6").addEventListener("click", cambiaValores6);
}
function cambiaValores6() {
    var inputValor6 = document.getElementById("cantidad");
    inputValor6.value = "30";
    var total6 = document.getElementById("total");
    total6.innerText = "$120.000";
}
window.addEventListener("load", cargaPagina7);
function cargaPagina7() {
    var btn7 = document.getElementById("button7").addEventListener("click", cambiaValores7);
}
function cambiaValores7() {
    var inputValor7 = document.getElementById("cantidad");
    inputValor7.value = "50";
    var total7 = document.getElementById("total");
    total7.innerText = "$200.000";
}
window.addEventListener("load", cargaPagina8);

function cargaPagina8() {
    var btn8 = document.getElementById("button8").addEventListener("click", cambiaValores8);
}
function cambiaValores8() {
    var inputValor8 = document.getElementById("cantidad");
    inputValor8.value = "100";
    var total8 = document.getElementById("total");
    total8.innerText = "$400.000";
}
/// Validación Para un rango en lacantidad de boletas ///
$(document).ready(function () {
    $(document).on('click', '.vali', function (event) {

        var Numvali = document.getElementById("cantidad").value;
        var Totali = document.getElementById("total").innerText;

        console.log(Numvali, Totali);
        if (Numvali < 3) {
            swal({
                title: "Minimo 3 Boletas.",
                type: "warning",
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "OK",
                closeOnConfirm: false
            });
        } else {
            setTimeout(function () {
                window.location.href = "checkout.php?cant=" + Numvali;
            }, 700);
        }
    });
});

$(document).ready(function () {
    $(document).on('click', '.busca', function (event) {
        var Numsucces = document.getElementById("search").value;
        if (Numsucces == "") {
            $('#alertabus').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Te Hizo Falta El Número De Celular<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
            $('#search').focus();
        } else {
            swal({
                title: "Buscando Boletas",
                type: "success",
            });
            setTimeout(function () {
                window.location.href = "search.php?search=" + Numsucces;
            }, 1500);
        }
    });
});