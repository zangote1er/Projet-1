<?php
// Fichier de configuration pour l'interface PHP
//  de notre annuaire LDAP

$conexionLdap = json_decode(file_get_contents("../Config/configLDAP.json"));
echo "Connexion...<br>";
$ds = ldap_connect($conexionLdap->servername,$conexionLdap->port);

 // on suppose que le serveur LDAP est sur le serveur local
 
if ($ds) {
 
    // Connexion avec une identité qui permet les modifications
    ldap_set_option($ds, LDAP_OPT_PROTOCOL_VERSION, 3); // IMPORTANT
    ldap_bind($ds, $conexionLdap->rootdn , $conexionLdap->rootpw);
 
    // Prépare les données
    $cn = $info["cn"] = "Emmanuel";
    $info["sn"]="Francois";
    
    $info["mail"]="";
    $info["objectClass"][0]="user";
    $info['userPassword'] = "";
    $info["userAccountControl"]=544;
 
    // Ajoute les données au dossier
    $r = ldap_add($ds, $cn , $conexionLdap->rootdn ,$info);
    ldap_close($ds);


} else {
    echo  "Impossible de se connecter au serveur LDAP";
}

