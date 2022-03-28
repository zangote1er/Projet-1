var attendEtat = document.getElementById("AttendInfoConexion");
var conexionEtat = document.getElementById("dataInfoConexion");
attendEtat.style.display = "none";

function recharge() {
    conexionEtat.style.display = "none";
    attendEtat.style.display = "";
    sleep(0.1);
    attendEtat.style.display = "";
    conexionEtat.style.display = "none";
}