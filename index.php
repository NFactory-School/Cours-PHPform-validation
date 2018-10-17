<?php

// Création des variables $error & $success
$error = array();
$success = 0;

// Test de soumission du formulaire
if(!empty($_POST['submitted'])){
    $nom = trim(strip_tags($_POST['nom']));
    $age = trim(strip_tags($_POST['age']));
    $description = trim(strip_tags($_POST['description']));
    $mail = trim(strip_tags($_POST['mail']));


// Gestion du nom
  if (!empty($nom)) {
    if(strlen($nom) < 3 || strlen($nom > 40)){
      $error['nom'] = 'Le nom doit être compris entre 3 et 40 caractères et ne pas comprendre de caractères interdits';
    }
  }else{
    $error['nom'] = 'Ce champ est obligatoire';
  }

// Gestion de l'âge
  if(!empty($age)){}
  else{
    $error['age'] = 'Ce champ est obligatoire';
  }

// Gestion du mail
  if(!empty($mail)){
    if(!filter_var($mail, FILTER_VALIDATE_EMAIL)){
      $error['mail'] = 'L\'email n\'est pas valide';
    }
  }
  else{
      $error['mail'] = 'Ce champ est obligatoire';
  }

// Gestion de la description
  if(!empty($description)){
    if(strlen($description) < 10 || strlen($description > 400)){
      $error['description'] = 'La description doit être comprise entre 10 et 400 caractères et ne doit pas comprendre de caractères interdits';
    }
  }else{
    $error['description'] = 'Ce champ est obligatoire';
  }

// S'il n'y a pas d'erreurs
if(count($error) == 0){
 $success = 1;
 $array = array(
   $_POST['nom'],
   $_POST['age'],
   $_POST['mail'],
   $_POST['description']
    );
  }
}
 ?>

<!-- Succès ? Données : Formulaire -->
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
<?php if($success == 1){
        echo 'Félicitations, vous avez rempli un formulaire !';echo'<br>';
        echo 'Nom : ', $_POST['nom'];echo'<br>';
        echo 'Age : ', $_POST['age'];echo'<br>';
        echo 'Mail : ', $_POST['mail'];echo'<br>';
        echo 'Description : ', $_POST['description'];echo'<br>';
      }
      else { ?>
        <form class="" action="index.php" method="post">
          <label for="nom">Nom</label>
          <input type="text" name="nom" value="<?php if(!empty($_POST['nom'])) {echo $_POST['nom'];}?>"><br>
          <span class="error"><?php if(!empty($error['nom'])){echo $error['nom'];};?></span><br>
          <label for="age">Âge</label>
          <input type="number" name="age" value="<?php if(!empty($_POST['age'])) {echo $_POST['age'];}?>" min="1" max="150" step="1"><br>
          <span class="error"><?php if(!empty($error['age'])){echo $error['age'];};?></span><br>
          <label for="mail">Email</label>
          <input type="mail" name="mail" value="<?php if(!empty($_POST['mail'])) {echo $_POST['mail'];}?>">
          <span class="error"><?php if(!empty($error['mail'])){echo $error['mail'];};?></span><br>
          <label for="description">Description</label><br>
          <textarea name="description" rows="8" cols="80"><?php if(!empty($_POST['description'])) {echo $_POST['description'];}?></textarea><br>
          <span class="error"><?php if(!empty($error['description'])){echo $error['description'];};?></span><br>
          <input type="submit" name="submitted" value="Envoyer">
        </form> <?php } ?>
  </body>
</html>
