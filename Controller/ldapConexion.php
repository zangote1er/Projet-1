<?php
// Déclaration des variations
$cn= htmlspecialchars($_POST['Nom']);
$Prénom= htmlspecialchars($_POST['Prénom']);
$Motdepasse= htmlspecialchars($_POST['Mot de passe ']);
echo "Ajout du user: $cn" <br>;
// Fichier de configuration pour l'interface PHP de notre annuaire LDAP

$conexionLdap = json_decode(file_get_contents("../Config/configLDAP.json"));
$ds = ldap_connect($conexionLdap->servername,$conexionLdap->port);
 or  die ('Could not connect to LDAP server');
 // on suppose que le serveur LDAP est sur le serveur local
 
if ($ds) {
 
      // Connexion avec une identité qui permet les modifications       $ds, $cn , $conexionLdap->rootdn ,$info
    ldap_bind($ds, $conexionLdap->rootdn);
 echo "Connected Successfully"
    //Prépare les données
    $info["cn"] = "$cn";
    $info["Prénom"]="$Prénom";
    $info["Mot de passe"]="$Motdepasse";
    $info["objectClass"]="inetOrgPerson";
 
    // Ajoute les données au dossier
$r=ldap_add(($dS, "CN=$cn , ou=Users, DC=Gestion,DC=personel,DC=Icam", $info);
$sr= ldap_search($ds, "DC=Gestion,DC=personel,DC=Icam", "cn=$cn");
$info= ldap_get_entries($ds, $sr);
 echo "L'utilisateur: <span class='result'>" $info[0] {"rootdn"} "</span> a été crée.  <br>"
}
ldap_close($ds);
?>