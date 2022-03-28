<?php


$curlImport = curl_init($urlContact); // A compléter
curl_setopt($curlImport, CURLOPT_RETURNTRANSFER, true);
$content = curl_exec($curlImport);
curl_close($curlImport);

echo ($content);
