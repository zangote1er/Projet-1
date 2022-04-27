<?php
// Déclaration des variations
$cn= htmlspecialchars($_POST['Nom']);
$Prénom= htmlspecialchars($_POST['Prénom']);
$Motdepasse= htmlspecialchars($_POST['Mot de passe ']);

// Fichier de configuration pour l'interface PHP de notre annuaire LDAP

$conexionLdap = json_decode(file_get_contents("../Config/configLDAP.json"));
$ds = ldap_connect("192.168.2.131" , 389) or  die ('Could not connect to LDAP server');
 // on suppose que le serveur LDAP est sur le serveur local
 
if ($ds) {
 
      // Connexion avec une identité qui permet les modifications       $ds, $cn , $conexionLdap->rootdn ,$info
$r= ldap_bind($ds, $conexionLdap->rootdn);
 echo "Connected Successfully";
   //Prépare les données
   $info["cn"] = $cn;
   $info["Prénom"]= $Prénom; 
   $info["Mot de passe"]=$Motdepasse;
   $info["objectClass"]="inetOrgPerson";

   // Ajoute les données au dossier
$r=ldap_add(( $link_identifier ="CN=Gestion-SERVER1-CA,DC=Gestion,DC=Personel,DC=Icam", $conexionLdap->port), $dn = ['CN=  , ou=Users, DC=Gestion,DC=Personel,DC=Icam'], $entry = ['cn' => '', 'Prénom' => '', 'Mot de passe' => '', 'objectClass' => 'inetOrgPerson'] );
$sr= ldap_search(($link_identifier ="CN=Gestion-SERVER1-CA,DC=Gestion,DC=Personel,DC=Icam", $conexionLdap->port), $base_dn = 'DC=Gestion,DC=Personel,DC=Icam', $filter = 'cn=');
$info= ldap_get_entries($ds, $sr);
echo "L'utilisateur: <span class='result'>" . $info[0] ["rootdn"] .  "</span> a été crée.  <br>";

ldap_close("192.168.2.131", $conexionLdap->port); 
} else{
   echo " Could not connect to LDAP server";
}
?>
   