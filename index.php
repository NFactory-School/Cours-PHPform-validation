<?php
// Vérifier si une variable existe, et si elle n'est pas vide : if(!empty($_GET/$_POST))
// if(!empty($_GET)){
//   print_r($_GET);
// }

$errors = array();
// vériifier si le formulaire est soumis
if(!empty($_POST['submitted'])){
// die('ok') => pour tester un formulaire.
// trim => supprime les espaces,
// strip_tags => supprime les balises(protection contre failles XSS => jamais sortir sans capote)
  $nom = trim(strip_tags($_POST['nom']));

//validation du nom et gestion d'erreurs
if(!empty($nom)){
$length = strlen($nom);
if ($length < 3){
  $errors['nom'] = '/!\ Le nom ne doit pas comprendre moins de 3 caractères /!\ ';
  }
  if ($length > 50){
    $errors['nom'] = '/!\ Le nom ne doit pas comprendre plus de 50 caractères /!\ ';
  }
}
else{
  $errors['nom'] = '/!\ Veuillez renseigner ce champ /!\ ';
  }
}
if(count($errors) == 0) {
  // no error
  //insert en bdd, envoi de mail. ETC...
}
 ?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/css/style.css">
    <title>Intro aux formulaires</title>
  </head>
  <body>
<!-- Toujours mettre le traitement PHP du formulaire avant le doctype:HTML -->
<!-- action : laisser vide = fichier actuel, ou mettre le nom du fichier en question -->
<!-- method : - get (par défaut) => uniquement pour les données non sensibles(recherche...)
              - post => pour les données sensible(mot de passe, id. etc..) -->
<!-- name : identifiant/clé(comme sur un tableau) -->
<!-- value : if(!empty) => garder la valeur en cas d'erreurs -->
    <form class="" action="" method="post">
      <input type="text" name="nom" value="<?php if(!empty($_POST['nom'])) {echo $_POST['nom'];}?>">
      <span class="error"><?php if(!empty($errors['nom'])){echo $errors['nom'];};?></span>
      <input type="submit" name="submitted" value="Envoyer">
    </form>
  </body>
</html>
