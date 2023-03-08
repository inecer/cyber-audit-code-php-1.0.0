<?php
/** 
 * Regroupe les fonctions de gestion d'un panier
 * @package default
 * @todo  RAS
 */

/**
 * Ajoute au panier la référence de fleur sélectionnée
 * 
 * Conserve en variable session la référence de la fleur
 * @param string ref de la fleur
 * @return void    
 */
function ajouterPanier($ref) 
{
  if (!isset($_SESSION["panier"])) 
  { 
    $_SESSION["panier"]=array();
    $_SESSION["qte"]=array();
    
  }
  // Nombre d'éléments dans le panier
  $nb = count($_SESSION["panier"]);
  
  // Recherche de la référence dans le panier existant
  $i = 0;
  $trouve = false;
  while ($i < $nb && $trouve==false)
  {
    if  ($ref == $_SESSION["panier"][$i])
    {
      // On incrémente le nombre de fleurs correspondant à cette référence
      $_SESSION["qte"][$i]= $_SESSION["qte"][$i] + 1;
      
      $trouve = true;
    }
    $i = $i + 1;
  }
  // Si la référence n'est pas déja présente dans le panier, on l'inscrit dans le panier, avec un equantité de 1
  if ($trouve == false)
  {      
      $_SESSION["panier"][$nb] = $ref;  
      $_SESSION["qte"][$nb]= 1;
  }
  echo "<br>references : "; 
  print_r($_SESSION["panier"]);
  echo "<br>quantites : ";
  print_r($_SESSION["qte"]);
  
}

/**
 * Obtenir le nombre d'éléments du panier
 * 
 * @return int 
 */
function comptePanier() 
{
  $compte=0;
  if (isset($_SESSION["panier"])) 
  { 
     $compte = count($_SESSION["panier"]);
  } 
  return ($compte);
}

/**
 * Obtenir les références de fleurs du panier
 * 
 * @return array 
 */
function obtenirPanier() 
{
  $panier=array();
  $panier["ref"]=array();
  $panier["qte"]=array();
  $nb = count($_SESSION["panier"]);
  $i=0;
  while($i<$nb)
  {
      $panier["ref"][$i]=$_SESSION["panier"][$i];
      $panier["qte"][$i]=$_SESSION["qte"][$i]; 
      $i = $i + 1;      
  }
  echo "<br>panier : ";
  print_r($panier);

  return ($panier);
}

/**
 * Retirer du panier la référence de fleur sélectionnée
 * 
 * Conserve en variable session la référence de la fleur
 * @param string : référence de la fleur
 * @return boolean : retrait effectué 
 */
 
// Solution alternative :
// unset($array[1]);
// $array = array_values($array);

function retirerPanier($ref) 
{
  $retirer = FALSE;
  
  // Si le panier n'est pas vide
  if (isset($_SESSION["panier"])) 
  { 
      $i = 0;
      // Nombre d'éléments dans la panier
      $nb = count($_SESSION["panier"]);
      
      // Rechercher la référence dans le panier
      while ($i < $nb )
      {
        // Si on trouve la référence au rang $i du tableau
        if ($_SESSION["panier"][$i] == $ref)
        {
          
          $retirer  = TRUE;
          
          // Décaler les éléments du panier à partir du rang $i
          // pour tasser le tableau
          while ($i<$nb-1)
          {
            $_SESSION["panier"][$i] = $_SESSION["panier"][$i+1];
            $_SESSION["qte"][$i] = $_SESSION["qte"][$i+1];
            
            $i = $i + 1;
          }
          // Supprimer le dernier élément du panier
          unset($_SESSION["panier"][$nb - 1]);
          unset($_SESSION["qte"][$nb - 1]);
           $nb = $nb - 1;
        }
        $i = $i + 1;
      }
      return $retirer;  
  }
    
  // print_r($_SESSION["panier"]);
}






?>
