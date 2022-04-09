<?php
    require_once("actions/connexion_db.php");
    $stm=$pdo -> prepare("select A.*, F.NOM as NOM_FOURNISSEUR, F.PRENOM as PRENOM_FOURNISSEUR from ARTICLE A 
    inner join FOURNISSEUR F on A.ID_FOURNISSEUR = F.ID_FOURNISSEUR
    where A.ID_CAT=?");
    $stm -> execute([$_GET["id"]]);
    $tab_article=$stm->fetchAll(PDO::FETCH_ASSOC); // Tableau qui contient les articles de la catégorie {{ID_CAT}}
    $stm=$pdo -> prepare("select * from CATEGORIE where ID_CAT=?");
    $stm -> execute([$_GET["id"]]);
    $categorie=$stm->fetch(PDO::FETCH_ASSOC); //Le nom et description de la catégorie {{ID_CAT}}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Catégorie</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="bootstrap-5.1.3-dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="bootstrap-5.1.3-dist/js/bootstrap.bundle.min.js"></script>
</head>
<body style="background: #edf2f7">
<?php require_once("navbar.php");?>
<div class="container mt-5">
  <h3>Categorie : <?= $categorie["NOM"] ?></h3>
  <p><?= $categorie["DESCRIPTION"] ?></p>
  <hr>
  <table class="table align-middle">
    <thead>
      <tr>
        <th>Nom</th>
        <th>Description</th>
        <th>Prix</th>
        <th>Quantité</th>
        <th>Image</th>
        <th>Fournisseur</th>
      </tr>
    </thead>
    <tbody>
<?php
    foreach($tab_article as $val){
        echo '<tr> <td><a href="info_article.php?id='.$val["ID_ARTICLE"].'">'.$val["NOM"].'</a></td>
        <td>'.$val["DESCRIPTION"].'</td> 
        <td>'.$val["PRIX"].'</td> <td>'.$val["NBR_EN_STOCK"].'</td> 
        <td><img width="100px" src="'.$val["IMAGE"].'"></td>
        <td><a href="info_fournisseur.php?id='.$val["ID_FOURNISSEUR"].'">'.$val["NOM_FOURNISSEUR"].' '.$val["PRENOM_FOURNISSEUR"].'</a></td> 
        <td><a type="button" href="actions/supprimer_article.php?id='.$val["ID_ARTICLE"].'" class="btn btn-default"><img src="icons/trash.png" width="20px" height="20px"></a>
        <a type="button" href="modf_article.php?id='.$val["ID_ARTICLE"].'" class="btn btn-default"><img src="icons/edit.png" width="20px" height="20px"></a></td></tr>';
    }
?>
    </tbody>
  </table>
</div>
</body>
</html>