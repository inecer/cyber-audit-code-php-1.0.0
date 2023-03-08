

<!-- Affichage des informations du panier-->

<div class="container">

    <table class="table table-bordered table-striped table-condensed">
      <caption>

        <h3>Panier</h3>

      </caption>
      <thead>
        <tr>
          <th>Image</th>
          <th>Référence</th>
          <th>Libellé</th>
          <th>Prix unitaire</th>
          <th>Quantite</th>
          <th>Prix total</th>
         </tr>
      </thead>
      <tbody>  
<?php
//print_r($lafleur);
    $i = 0;
    while($i < count($lafleur))
    { 
 ?>     
        <tr>
            <td align="center"><img class="img-polaroid" src="../images/<?php echo $lafleur[$i]["image"]?>" /></td>
            <td><?php echo $lafleur[$i]["ref"]?></td>
            <td><?php echo $lafleur[$i]["designation"]?></td>
            <td align="right"><?php echo $lafleur[$i]["prix"]?></td>
            <td align="right"><?php echo $qte[$i]?></td>          
            <td align="right"><?php echo $lafleur[$i]["prix"]*$qte[$i]?></td>          
            <td> <a href="gererPanier.php?ref=<?php echo $lafleur[$i]["ref"]?>" >Retirer du panier</a> </td>
 
        </tr>
<?php
        $i = $i + 1;
     }
?>  
       <tr>
            <td> <b> Prix total : </b> </td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td align="right"><?php echo $total. " euros" ?></td>
        </tr>
      
       </tbody>       
     </table>    
  </div>

 
