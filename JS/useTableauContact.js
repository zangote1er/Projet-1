var flecheBas = "▼";
var flecheHaut = "▲";
var filePhp = "../Controller/contactCurlImport.php";
var tableauJson = {};

function buildTable(data) {
  var table = document.getElementById('tableContact')
  table.innerHTML = "";

  for (var i = 0; i < data.total; i++) {
    var colName = `Name-${i}`
    var colNumber = `Number-${i}`
    var row = `<tr id=\"trContact\"><td>${data.rows[i].fullname}</td><td>${data.rows[i].username}</td></tr>`
    table.innerHTML += row
  }
}

function tri(element) {
  console.log(element)
  var text = element.textContent;
  var column = "fullname"

  if (text.includes("Name")) {
    column = "fullname"
    var nomEnTete = "Name "
  } else {
    column = "username"
    var nomEnTete = "Number "
  }

  if (text.includes(flecheHaut)) {
    tableauJson.rows = tableauJson.rows.sort((a, b) => a[column] > b[column] ? 1 : -1)
    nomEnTete = nomEnTete + flecheBas + " "
  } else {
    tableauJson.rows = tableauJson.rows.sort((a, b) => a[column] < b[column] ? 1 : -1)
    nomEnTete = nomEnTete + flecheHaut + " "
  }
  element.textContent = nomEnTete;
  buildTable(tableauJson)
  searchTableContact()
}

var xmlhttp = new XMLHttpRequest();
xmlhttp.onload = function () {
  var myArray = JSON.parse(this.responseText);
  tableauJson = myArray;
  tri(document.getElementById("conctactName"));
}
xmlhttp.open("GET", filePhp);
xmlhttp.send();


function searchTableContact() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("inputContact");
  filter = input.value.toUpperCase();
  table = document.getElementById("tableContact");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
