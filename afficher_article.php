<!DOCTYPE html>
<html lang="en">
<head>
  <title>Liste des articles</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="bootstrap-5.1.3-dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="bootstrap-5.1.3-dist/js/bootstrap.bundle.min.js"></script>
</head>
<body style="background: #edf2f7">
<?php 
// Afficher la table des articles enregistrer dans la BBD
require_once("navbar.php");?>
<div class="container mt-5">
  <h3>Articles</h3>
  <p>Liste des articles disponible en stock</p>
  <a type="button" href="form_article.php" class="btn btn-primary"><img src="icons/add.png" width="20px" height="20px"> Ajouter</a>

  <table class="table align-middle">
    <thead>
      <tr>
        <th>Nom</th>
        <th>Description</th>
        <th>Prix</th>
        <th>Quantité</th>
        <th>Image</th>
        <th>Categorie</th>
        <th>Fournisseur</th>
      </tr>
    </thead>
    <tbody>
<?php
    require_once("actions/connexion_db.php");
    $stm=$pdo -> prepare("select A.*, C.NOM as NOM_CATEG, F.NOM as NOM_FOURNISSEUR, F.PRENOM as PRENOM_FOURNISSEUR from ARTICLE A 
                          inner join CATEGORIE C on A.ID_CAT = C.ID_CAT
                          inner join FOURNISSEUR F on A.ID_FOURNISSEUR = F.ID_FOURNISSEUR");
    $stm -> execute();
    $tab=$stm->fetchAll(PDO::FETCH_ASSOC);
    foreach($tab as $val){
        echo '<tr><td><a href="info_article.php?id='.$val["ID_ARTICLE"].'">'.$val["NOM"].'</a></td> 
        <td>'.$val["DESCRIPTION"].'</td> 
        <td>'.$val["PRIX"].'</td> <td>'.$val["NBR_EN_STOCK"].'</td> 
        <td><img width="100px" src="'.$val["IMAGE"].'"></td>
        <td><a href="info_categorie.php?id='.$val["ID_CAT"].'">'.$val["NOM_CATEG"].'</a></td>
        <td><a href="info_fournisseur.php?id='.$val["ID_FOURNISSEUR"].'">'.$val["NOM_FOURNISSEUR"].' '.$val["PRENOM_FOURNISSEUR"].'</a></td> 
        <td><a type="button" href="modf_article.php?id='.$val["ID_ARTICLE"].'" class="btn btn-default"><img src="icons/edit.png" width="20px" height="20px"></a>
        <br><a type="button" href="actions/supprimer_article.php?id='.$val["ID_ARTICLE"].'" class="btn btn-default"><img src="icons/trash.png" width="20px" height="20px"></a></td></tr>';
        // Liste des artiles + lien pour avoir les info sur les categ et fourn + boutton Modifier & Supprimer 
      }
?>
    </tbody>
  </table>
</div>
</body>
</html>