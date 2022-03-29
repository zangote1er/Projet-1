<?php
/*
    Created by Hubert MOUGINOT : hubert.mouginot@ucac-icam.fr
    19 nov. 2019, Campus UCAC-ICAM Yassa, Douala
    for created csv of intern contact
*/
$conexion = json_decode(file_get_contents("../Config/conexionRouter.json"));


$curlImport = curl_init($conexion->urlListContact);// A compléter
curl_setopt($curlImport, CURLOPT_RETURNTRANSFER, true);
$content = curl_exec($curlImport);
curl_close($curlImport);

echo($content);
/*
// cree un fichier csv avec le json
$csvContact = "";
$filebrute = "list.csv";

$objContact = json_decode($content);
foreach ($objContact->rows as $row){
    $csvContact=$csvContact."\"".$row->fullname."\",\"".$row->cid_number."\"\n";
}
file_put_contents($filebrute,$csvContact);

//cree un fichier json
$filebrute = "list.json";
file_put_contents($filebrute,$content);
*/
