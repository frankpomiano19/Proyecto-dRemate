function pasar() {
    var inicioSubasta = document.getElementById("fechaInicio");
    var fechaHoy = new Date();

    var inicioSubastaF = fechaHoy.getFullYear() + "-" + (fechaHoy.getMonth() +1 + "-" + fechaHoy.getDate());

    alert(inicioSubastaF);

    inicioSubasta.setAttribute("min",inicioSubastaF);
}

pasar();