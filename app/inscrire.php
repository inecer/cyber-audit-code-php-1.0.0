<?php
/** 
 * Script de contrôle et d'affichage du cas d'utilisation "Inscrire"
 * @package default
 * @todo  RAS
 */
 
  $repInclude = './include/';
  $repVues = './vues/';
  
require($repInclude . "_init.inc.php");
  
$unNom=lireDonneePost("nom", "");
$unMdp=lireDonneePost("mdp", "");
$unMdp2=lireDonneePost("mdp2", "");

if (count($_POST)==0)
{
  $etape = 1;
}
else
{
  $etape = 2;
  
  // Si les 2 mots de passe saisis sont identiques
  // effectuer l'inscription
  if ($unMdp != $unMdp2)
  {
      $message = " Echec : les deux saisies du mot de passe sont différentes !";
      ajouterErreur($tabErreurs, $message);
      //print_r($tabErreurs);
    }
  else
  {  
    inscrire($unNom, $unMdp,$tabErreurs);
  }
}

// Construction de la page Inscrire
// pour l'affichage (appel des vues)
include($repVues."entete.php") ;
include($repVues."menu.php") ;
include($repVues."erreur.php");
include($repVues."vInscrireForm.php") ;
include($repVues."pied.php") ;
?>
  
