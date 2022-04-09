<!DOCTYPE html>
<html lang="en">
<head>
  <title>Liste des fournisseurs</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="bootstrap-5.1.3-dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="bootstrap-5.1.3-dist/js/bootstrap.bundle.min.js"></script>
</head>
<body style="background: #edf2f7">
<?php 
// Afficher la table des fournisseurs enregistrer dans la BBD
require_once("navbar.php");?>
<div class="container mt-5">
  <h3>Fournisseurs</h3>
  <p>Liste des fournisseurs</p>
  <a type="button" href="form_fournisseur.php" class="btn btn-primary" style="color:black"><img src="icons/add.png" width="20px" height="20px"> Ajouter</a>

  <hr>
  <table class="table align-middle">
    <thead>
      <tr>
        <th>CIN</th>
        <th>Nom</th>
        <th>Prenom</th>
        <th>Adresse</th>
        <th>Telephone</th>
        <th>Email</th>
      </tr>
    </thead>
    <tbody>
<?php
    require_once("actions/connexion_db.php");
    $stm=$pdo -> prepare("select * from FOURNISSEUR");
    $stm -> execute();
    $tab=$stm->fetchAll(PDO::FETCH_ASSOC);
    foreach($tab as $val){
        echo '<tr> <td>'.$val["CIN"].'</td> 
        <td><a href="info_fournisseur.php?id='.$val["ID_FOURNISSEUR"].'">'.$val["NOM"].'</a></td> 
        <td><a href="info_fournisseur.php?id='.$val["ID_FOURNISSEUR"].'">'.$val["PRENOM"].'</a></td> 
        <td>'.$val["ADRESSE"].'</td> <td>'.$val["TELEPHONE"].'</td> <td>'.$val["EMAIL"].'</td> 
        <td><a type="button" href="actions/supprimer_fournisseur.php?id='.$val["ID_FOURNISSEUR"].'" class="btn btn-default"><img src="icons/trash.png" width="20px" height="20px"></a>
        <a type="button" href="modf_fournisseur.php?id='.$val["ID_FOURNISSEUR"].'" class="btn btn-default"><img src="icons/edit.png" width="20px" height="20px"></a></td></tr>';
        // Liste des categories + boutton Modifier & Supprimer 
      }
?>
    </tbody>
  </table>
</div>
</body>
</html>