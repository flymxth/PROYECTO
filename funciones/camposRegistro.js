function validarFormulario() {
    let nombre = document.getElementById("nombre").value.trim();
    let apellidos = document.getElementById("apellidos").value.trim();
    let usuario = document.getElementById("usuario").value.trim();
    let email = document.getElementById("email").value.trim();
    let fecha = document.getElementById("fecha").value.trim();
    let password = document.getElementById("password").value.trim();
    


    if (nombre === "") {
        document.getElementById("nombreError").style.display = "block";
        isValid = false;
    }
    else {
        document.getElementById("nombreError").style.display = "none";
    }



    if(apellidos === "") {
        document.getElementById("apellidosError").style.display = "block";
        isValid = false;
    }
    else {
        document.getElementById("apellidosError").style.display = "none";
    }



    if(usuario === "") {
        document.getElementById("usuarioError").style.display = "block";
    }
    else {
        document.getElementById("usuarioError").style.display = "none";
    }



    if(email === "") {
        document.getElementById("emailError").style.display = "block";
    }
    else {
        document.getElementById("emailError").style.display = "none";
    }



    if(fecha === "") {
        document.getElementById("fechaError").style.display = "block";
    }
    else {
        document.getElementById("fechaError").style.display = "none";
    }



    if(password === ""){
        document.getElementById("passwordError").style.display = "block";
    }
    else {
        document.getElementById("passwordError").style.display = "none";
    }

    return isValid;
}