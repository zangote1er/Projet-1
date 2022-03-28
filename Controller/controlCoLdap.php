<?php
 // Fichier de configuration pour l'interface PHP
   //  de notre annuaire LDAP
   $server = "ldap.forumsys.com";
$port = "389";
$racine = "";
$rootdn = "cn=read-only-admin,dc=example,dc=com";
$rootpw = "password";

echo "Connexion...<br>";
$ds= ldap_connect("ldap.forumsys.com");
// on s'authentifie en tant que super-utilisateur, ici, ldap_admin
if (ldap_bind($ds,$rootdn,$rootpw)) {
   
// Ici les opérations à effectuer
  echo "connected successfully";
}
else {
 echo  "Impossible de se connecter au serveur LDAP";
}
