<?php
// Vérifier si une variable existe, et si elle n'est pas vide : $_GET(cf. SUPERGLOBALS)
if(!empty($_POST)){
  print_r($_POST);
  echo $_POST['nom'];
}
 ?>

<!-- Toujours mettre le traitement PHP du formulaire avant le doctype HTML -->
<!-- action : laisser vide = fichier actuel, ou mettre le nom du fichier en question -->
<!-- method : - get (par défaut) => pas de modification de la base de données(recherche...)
              - post => -->
<!-- name : identifiant/clé(comme sur un tableau) -->

<form action="" method="post">
  <input type="text" name="nom" value="">
  <input type="submit" name="submitted" value="Envoyer">
</form>
