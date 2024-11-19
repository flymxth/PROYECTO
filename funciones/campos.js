function validarFormulario() {
    let usuario = document.getElementById("usuario").value.trim();
    let password = document.getElementById("password").value.trim();
    let isValid = true;

    if (usuario === "") {
        document.getElementById("usuarioError").style.display = "block";
        isValid = false;
    }

    else {
        document.getElementById("usuarioError").style.display = "none";
    }


    if(usuario === "") {
        document.getElementById("passwordError").style.display = "block";
        isValid = false;
    }

    else {
        document.getElementById("passwordError").style.display = "none";
    }

    return isValid;
}