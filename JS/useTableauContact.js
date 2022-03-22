var flecheBas = "▼";
var flecheHaut= "▲";
var filePhp = "../Controller/extractContact.php";
var tableauJson = {};

  function buildTable(data){
    var table = document.getElementById('mytable')
    table.innerHTML =''
  
    for (var i = 0; i < data.total; i++){
      var colName = `Name-${i}`
      var colNumber = `Number-${i}`
      var row= `<tr><td>${data.rows[i].fullname}</td><td>${data.rows[i].username}</td></tr>`
      table.innerHTML += row
    }
  }

  function tri(element){
    console.log(element)
    var text = element.textContent;
    var column = "fullname"

    if(text.includes("Name")){
      column = "fullname"
      var nomEnTete = "Name "
    }else{
      column = "username"
      var nomEnTete = "Number "
    }
  
    if(text.includes(flecheHaut)){
      tableauJson.rows = tableauJson.rows.sort((a,b) => a[column] > b[column] ? 1 : -1)
      nomEnTete = nomEnTete + flecheBas+ " "
    }else{
      tableauJson.rows = tableauJson.rows.sort((a,b) => a[column] < b[column] ? 1 : -1)
      nomEnTete = nomEnTete + flecheHaut + " "
    }
    element.textContent = nomEnTete;
    buildTable(tableauJson)
  }
  
  
  function search() {
    // Declare variables
    var input, filter, ul, li, a, i, txtValue;
    input = document.getElementById('myInput');
    filter = input.value.toUpperCase();
    ul = document.getElementById("myUL");
    li = ul.getElementsByTagName('li');
  
    // Loop through all list items, and hide those who don't match the search query
    for (i = 0; i < li.length; i++) {
      a = li[i].getElementsByTagName("a")[0];
      txtValue = a.textContent || a.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        li[i].style.display = "";
      } else {
        li[i].style.display = "none";
      }
    }
  }


var xmlhttp = new XMLHttpRequest();
xmlhttp.onload = function() {
   var myArray =JSON.parse(this.responseText);
   tableauJson = myArray;
   tri(document.getElementById("conctactName"));
  }
xmlhttp.open("GET", filePhp);
xmlhttp.send();




   