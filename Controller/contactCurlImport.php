<?php
/*
    Created by Hubert MOUGINOT : hubert.mouginot@ucac-icam.fr
    19 nov. 2019, Campus UCAC-ICAM Yassa, Douala
    for created csv of intern contact
*/
$conexion = json_decode(file_get_contents("../Config/conexionRouter.json"));

$curlImport = curl_init($conexion->urlListContact); // A compléter
curl_setopt($curlImport, CURLOPT_RETURNTRANSFER, true);
$content = curl_exec($curlImport);
curl_close($curlImport);

echo ($content);
//echo(file_get_contents("../Config/listContact.json"));
