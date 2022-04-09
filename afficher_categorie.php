<!DOCTYPE html>
<html lang="en">
<head>
  <title>Liste des catégories</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="bootstrap-5.1.3-dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="bootstrap-5.1.3-dist/js/bootstrap.bundle.min.js"></script>
</head>
<body style="background: #edf2f7">
<?php 
// Afficher la table des categories enregistrer dans la BBD
require_once("navbar.php");?>
<div class="container mt-5">
  <h3>Categories</h3>
  <p>Liste des catégories</p>
  <a type="button" href="form_categorie.php" class="btn btn-primary" style="color:black"><img src="icons/add.png" width="20px" height="20px"> Ajouter</a>

  <hr>        
  <table class="table align-middle">
    <thead>
      <tr>  
        <th>Nom</th>
        <th>Description</th>
      </tr>
    </thead>
    <tbody>
<?php
    require_once("actions/connexion_db.php");
    $stm=$pdo -> prepare("select * from CATEGORIE");
    $stm -> execute();
    $tab=$stm->fetchAll(PDO::FETCH_ASSOC);
    foreach($tab as $val){
        echo '<tr> <td><a href="info_categorie.php?id='.$val["ID_CAT"].'">'.$val["NOM"].'</a> </td> 
        <td>'.$val["DESCRIPTION"].'</td> 
        <td><a type="button" href="actions/supprimer_categorie.php?id='.$val["ID_CAT"].'" class="btn btn-default"><img src="icons/trash.png" width="20px" height="20px"></a>
        <a type="button" href="modf_categorie.php?id='.$val["ID_CAT"].'" class="btn btn-default"><img src="icons/edit.png" width="20px" height="20px"></a></td></tr>';
        // Liste des categories + boutton Modifier & Supprimer 
      }
?>
    </tbody>
  </table>
</div>
</body>
</html>