document.getElementById("AttendInfoConexion");
document.getElementById("dataInfoConexion");
var internetInfoPhp = "../Controller/internetStatus.php";
var sla = {};

var loadInernetInfo = new XMLHttpRequest();
loadInernetInfo.onload = function () {
    sla = JSON.parse(this.responseText);
    charge();
};
loadInernetInfo.open("GET", internetInfoPhp);
loadInernetInfo.send();



function charge() {
    dataInfoConexion.querySelectorAll("th.data_internet").forEach(element => {
        if (sla[element.id] > 85) {
            element.classList.add('bg-warning');
            element.classList.remove('bg-success');
            element.textContent = "Down";
        } else {
            element.classList.add('bg-success');
            element.classList.remove('bg-warning');
            element.textContent = "Up";
        }
    });
    document.getElementById("dataInfoConexion").style.display = "";
    document.getElementById("AttendInfoConexion").style.display = "none";
}

function recharge() {
    document.getElementById("dataInfoConexion").style.display = "none";
    document.getElementById("AttendInfoConexion").style.display = "";
    var loadInernetInfo = new XMLHttpRequest();
    loadInernetInfo.onload = function () {
        sla = JSON.parse(this.responseText);
        charge();
    };
    loadInernetInfo.open("GET", internetInfoPhp);
    loadInernetInfo.send();

    console.log(sla);
}