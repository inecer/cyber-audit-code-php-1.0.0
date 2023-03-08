
<!-- Affichage des messages d'erreur ou de réussite
    ================================================== -->

<?php
      
if ( nbErreurs($tabErreurs) > 0 ) 
{
 ?>
 <div class="container">
    <div class="alert alert-error">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>Erreur !</strong> <?php echo toStringErreurs($tabErreurs);?>
    </div>
 </div>            
 <?php               
}

if (isset($reussite))
{
  ?>
  <div class="container">
      <div class="alert alert-success">
      <button type="button" class="close" data-dismiss="alert">×</button>
      <strong>  <?php echo $messageActionOk;?> </strong>
      </div>
   </div>            
   <?php              
}

if (isset($avertissement))
{
  ?>
  <div class="container">
      <div class="alert alert-info">
      <button type="button" class="close" data-dismiss="alert">×</button>
      <strong>  <?php echo $messageAvert;?> </strong>
      </div>
   </div>            
   <?php               
}

?>

