function valPrecio() {
    var mod = document.getElementById("tipo_pago").value;
    var valor;
    if (mod == "Diario") {
        document.getElementById("valor").value=("5000");
    }
    if (mod == "Quincenal") {
        document.getElementById("valor").value=("40000");
    }
    if (mod == "Mensual") {
        document.getElementById("valor").value=("65000");
    }
    /* document.getElementById("valor").value=document.getElementById("tpago").value; */
}



