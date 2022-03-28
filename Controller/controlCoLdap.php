<?php
// Fichier de configuration pour l'interface PHP
//  de notre annuaire LDAP

$conexionLdap = json_decode(file_get_contents("../Config/conexionRouter.json"));
echo "Connexion...<br>";
$ds = ldap_connect($conexionLdap->server);
// on s'authentifie en tant que super-utilisateur, ici, ldap_admin
if (ldap_bind($conexionLdap->ds, $conexionLdap->rootdn, $conexionLdap->rootpw)) {

    // Ici les opérations à effectuer
    echo "connected successfully";
} else {
    echo  "Impossible de se connecter au serveur LDAP";
}
