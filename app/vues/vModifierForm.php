<!--Saisir les informations dans un formulaire!-->
<div class="container">
  <form action="" method=post>
    <input type="hidden" name="etape" value="3" />

    <fieldset>
      <legend>Entrez les données sur la fleur à modifier </legend>
      <label> Référence :</label>
      <label><?php echo $lafleur["ref"]; ?> </label>
      <input type="hidden" name="refcache" value="<?php echo $lafleur["ref"]; ?>" /><br />
      <label>Désignation :</label>
      <input type="text" name="des" value="<?php echo $lafleur["designation"]; ?>" size="20" /><br />
      <label>Prix :</label>
      <input type="text" name="prx" value="<?php echo $lafleur["prix"]; ?>" size="10" /><br />
      <label>Image :</label>
      <input type="text" name="ima" value="<?php echo $lafleur["image"]; ?>" size="20"/><br />
      <label>Catégorie :</label>
      <input type="text" name="cat" value="<?php echo $lafleur["categorie"]; ?>" size="10"/><br />
    </fieldset>
    <button type="submit" class="btn btn-primary">Modifier</button>
    <button type="reset" class="btn">Annuler</button>
    <p />
  </form> 
</div>


