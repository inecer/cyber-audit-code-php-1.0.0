<?php
/** 
 * Script de contrôle et d'affichage du cas d'utilisation "Identifier"
 * @package default
 * @todo  RAS
 */
 
$repInclude = './include/';
$repVues = './vues/';

require($repInclude . "_init.inc.php");
  
$unNom=lireDonneePost("nom", "");
$unMdp=lireDonneePost("mdp", "");

if (count($_POST)==0)
{
  $etape = 1;
}
else
{
  $etape = 2;
  // Identifier l'utilisateur
  $lgUser = identifier($unNom, $unMdp, $tabErreurs);
  // Si l'identification est réussie (les informations utilisateur sont fournies 
  // sous forme de tableau)
  if ( is_array($lgUser) ) 
  { 
      affecterInfosConnecte($lgUser["id"], $lgUser["nom"], $lgUser["cat"]);
  }
  else 
  {
      ajouterErreur($tabErreurs, "Pseudo et/ou mot de passe incorrects");
  }
  if ( nbErreurs($tabErreurs) == 0 ) 
  {
   header("Location:indexzz.php");
  }  
}

// Construction de la page Identifier
// pour l'affichage (appel des vues)
include($repVues."entete.php") ;
include($repVues."menu.php") ;
include($repVues."erreur.php");
include($repVues."vIdentifierForm.php") ;
include($repVues."pied.php") ;
?>
  
