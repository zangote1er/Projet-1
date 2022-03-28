<?php
 // Fichier de configuration pour l'interface PHP
   //  de notre annuaire LDAP
   $server = "server 2012 R2";
$port = "";
$racine = "";
$rootdn = "cn=ldap_admin, o=  c=fr";
$rootpw = "Détermine@23";

echo "Connexion...<br>";
$ds= ldap_connect($server,$port);
if ($ds==1)
  {
  // on s'authentifie en tant que super-utilisateur, ici, ldap_admin
  $r= ldap_bind($ds,$rootdn,$rootpw);
// Ici les opérations à effectuer
}
else {
 echo  "Impossible de se connecter au serveur LDAP";
}
 ?>  
   
