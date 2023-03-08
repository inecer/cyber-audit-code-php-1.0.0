<?php
/** 
 * Script de contrôle et d'affichage du cas d'utilisation "Rechercher"
 * @package default
 * @todo  RAS
 */
 
  $repInclude = './include/';
  $repVues = './vues/';
  
  require($repInclude . "_init.inc.php");
  
   // Si le client vient de demander le retrait d'une fleur 
  if (isset($_GET["ref"]))
  {
    $resultat = retirerPanier($_GET["ref"]);
  }
  
  // Lire les informations du panier
  
  $lafleur = array();
  $qte = array();
  
  
  $nombreElements = comptePanier(); 
  
  // Prix total du panier
  $total = 0;
  
  if ($nombreElements>0)
  { 
      // Obtenir les références de fleur du panier
      $panier=obtenirPanier();
      
      // Obtenir dans la base les fleurs correspondant aux références
      $i=0;
      while ($i<$nombreElements)
      {
          //$lafleur[$i]=array();
          $lafleur[$i]=rechercherRef($panier["ref"][$i],$tabErreurs);
          $qte[$i]=$panier["qte"][$i];
          $total = $total +  $lafleur[$i]['prix']*$qte[$i];
         
          //print_r($lafleur[$i]);
          //echo "\n";
          $i = $i + 1;
      }
      include($repVues."vPanier.php");
      //print_r($lafleur);
    }  
   
   else       // Si le panier est vide 
    {   
          $message = "Attention, le panier est vide !!! Pour ajouter des fleurs, cliquez 
          <a href=lister.php>ici</a> ";        
          ajouterErreur($tabErreurs, $message);
    }
  
  

  // Construction de la page Panier
  // pour l'affichage (appel des vues)
  include($repVues."entete.php") ;
  include($repVues."menu.php") ;
  include($repVues."erreur.php") ;  
  include($repVues."pied.php") ;
  ?>
    
