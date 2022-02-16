function valPrecio() {
    var mod = document.getElementById("tipo_pago").value;
    var valor;
    if (mod == "Diario") {
        document.getElementById("valor").value=("5.000");
    }
    if (mod == "Quincenal") {
        document.getElementById("valor").value=("40.000");
    }
    if (mod == "Mensual") {
        document.getElementById("valor").value=("65.000");
    }
    /* document.getElementById("valor").value=document.getElementById("tpago").value; */
}



