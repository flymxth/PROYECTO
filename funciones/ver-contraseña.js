const txtPassword = document.getElementById("password");
const chk = document.getElementById("chk");

chk.onchange = function() {
    txtPassword.type = chk.checked ? "text" : "password";
};