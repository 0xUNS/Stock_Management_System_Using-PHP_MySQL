<?php
    require_once("actions/connexion_db.php");
    $stm=$pdo -> prepare("select A.*, C.NOM as NOM_CATEG from ARTICLE A 
                          inner join CATEGORIE C on A.ID_CAT = C.ID_CAT
                          where A.ID_FOURNISSEUR=?");
    $stm -> execute([$_GET["id"]]);
    $tab_artcicle=$stm->fetchAll(PDO::FETCH_ASSOC); // Tableau qui contient les articles de la catégorie {{ID_FOURNSSEUR}}
    $stm=$pdo -> prepare("select * from FOURNISSEUR where ID_FOURNISSEUR=?");
    $stm -> execute([$_GET["id"]]);
    $fournisseur=$stm->fetch(PDO::FETCH_ASSOC); // Selectionner les informations du fourniseur {{ID_FOURNSSEUR}}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Fournisseur</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="bootstrap-5.1.3-dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="bootstrap-5.1.3-dist/js/bootstrap.bundle.min.js"></script>
</head>
<body style="background: #edf2f7">
<?php require_once("navbar.php");?>
<div class="container mt-5">
  <h3>Fournisseur : <?= $fournisseur["NOM"].' '.$fournisseur["PRENOM"]?></h3>
  <p> Contact :  <?= $fournisseur["TELEPHONE"].' - '.$fournisseur["EMAIL"]?></p>
  <p> Adresse :  <?= $fournisseur["ADRESSE"]?></p>

  <hr>
  <table class="table align-middle">
    <thead>
      <tr>
        <th>Nom</th>
        <th>Description</th>
        <th>Prix</th>
        <th>Quantité</th>
        <th>Image</th>
        <th>Categorie</th>
      </tr>
    </thead>
    <tbody>
<?php
    foreach($tab_artcicle as $val){
        echo '<tr> <td><a href="info_article.php?id='.$val["ID_ARTICLE"].'">'.$val["NOM"].'</a></td>
        <td>'.$val["DESCRIPTION"].'</td> <td>'.$val["PRIX"].'</td> <td>'.$val["NBR_EN_STOCK"].'</td> 
        <td><img width="100px" src="'.$val["IMAGE"].'"></td>
        <td><a href="info_categorie.php?id='.$val["ID_CAT"].'">'.$val["NOM_CATEG"].'</a></td> 
        <td><a type="button" href="actions/supprimer_article.php?id='.$val["ID_ARTICLE"].'" class="btn btn-default"><img src="icons/trash.png" width="20px" height="20px"></a>
        <br><a type="button" href="modf_article.php?id='.$val["ID_ARTICLE"].'" class="btn btn-default"><img src="icons/edit.png" width="20px" height="20px"></a></td></tr>';
    }
?>
  </table>
    </form>
    </tbody>
  </table>
</div>
</body>
</html>