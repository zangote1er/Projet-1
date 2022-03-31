<?php
/*
    Created by Hubert MOUGINOT : hubert.mouginot@ucac-icam.fr
    19 nov. 2019, Campus UCAC-ICAM Yassa, Douala
    for created csv of intern contact
*/

$file_config = "../Config/conexionRouter.json";
$file_output = "../Config/listContact.json";
if (file_exists($file_config)) {

    //int var
    $internet = json_decode(file_get_contents($file_config));
    $conexion = json_decode(file_get_contents("../Config/conexionRouter.json"));

    $curlImport = curl_init($conexion->urlListContact); // A compléter
    curl_setopt($curlImport, CURLOPT_RETURNTRANSFER, true);
    $content = curl_exec($curlImport);
    curl_close($curlImport);

    file_put_contents($file_output, $content);
}
echo (file_get_contents($file_output));

//echo(file_get_contents("../Config/listContact.json"));
