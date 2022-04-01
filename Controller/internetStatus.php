<?php
$file_config = "../Config/conexionRouter.json";
$file_output = "../Config/internetStatus.json";
if (file_exists($file_config)) {

    //int var
    $internet = json_decode(file_get_contents($file_config));
    $sla = "{";

    //request Login
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_HEADER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_URL, "" . $internet->urlLoginRouter);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $internet->loginRouter);
    $result = curl_exec($ch);
    curl_close($ch);
    //create cookie
    $APSCOOKIE_4188404095 = explode(";", explode("HTTP", explode("=", explode(" ", explode("APSCOOKIE_4188404095", $result)[1])[0])[1])[0])[0];
    $ccsrftoken_4188404095 = explode(";", explode("HTTP", explode("=", explode(" ", explode("ccsrftoken_4188404095", $result)[1])[0])[1])[0])[0];
    $ccsrftoken = explode(";", explode("HTTP", explode("=",  explode(" ", explode("ccsrftoken", $result)[1])[0])[1])[0])[0];
    $cookies = array("Cookie:APSCOOKIE_4188404095=" . $APSCOOKIE_4188404095, "Cookie:ccsrftoken_4188404095=" . $ccsrftoken_4188404095, "Cookie:ccsrftoken=" . $ccsrftoken);
    //request SLA
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_HTTPGET, true);
    curl_setopt($ch, CURLOPT_URL, $internet->urlSla);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $cookies);
    $result = curl_exec($ch);
    curl_close($ch);
    //create reponse json sla
    $jsonResult = json_decode($result);
    for ($i = 0; $i < count($jsonResult->results); $i++) {
        $sla = $sla . "\"" . $jsonResult->results[$i]->interface . "\":\"" . $jsonResult->results[$i]->logs[1000]->link . "\"";
        if ($i < count($jsonResult->results) - 1) {
            $sla = $sla . ",";
        }
    }
    $sla = $sla . "}";
    file_put_contents($file_output, $sla);
    echo (file_get_contents($file_output));
}
