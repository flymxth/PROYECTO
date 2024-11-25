function validarFormulario() {
    let nombre = document.getElementById("nombre").value.trim();
    let apellidos = document.getElementById("apellidos").value.trim();
    let telefono = document.getElementById("telefono").value.trim();
    let aportacion = document.getElementById("aportacion").value.trim();
    let fecha = document.getElementById("fecha").value.trim();
    let isValid = true;

    if(nombre === "") {
        document.getElementById("nombreError").style.display = "block";
        isValid = false;
    } else {
        document.getElementById("nombreError").style.display = "none";
    }


    if(apellidos === "") {
        document.getElementById("apellidosError").style.display = "block";
        isValid = false;
    } else {
        document.getElementById("apellidosError").style.display = "none";
    }


    if(telefono === "") {
        document.getElementById("telefonoError").style.display = "block";
        isValid = false
    } else {
        document.getElementById("telefonoError").style.display = "none";
    }


    if(aportacion === "") {
        document.getElementById("aportacionError").style.display = "block";
        isValid = false;
    } else {
        document.getElementById("aportacionError").style.display = "none";
    }

    if(fecha === "") {
        document.getElementById("fechaError").style.display = "block";
        isValid = false;
    } else {
        document.getElementById("fechaError").style.display = "none";
    }

    return isValid;
}