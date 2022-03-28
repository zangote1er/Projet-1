<?php


$internet = json_decode(file_get_contents("../Config/conexionRouter.json"));

$curlImport = curl_init($internet->urlLogin); // A compléter
curl_setopt($curlImport, CURLOPT_RETURNTRANSFER, true);
$content = curl_exec($curlImport);
curl_close($curlImport);

echo ($content);
