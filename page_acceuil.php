<?php
    require_once("actions/connexion_db.php");
    $stm=$pdo -> prepare("select count(ID_ARTICLE) as total_article from ARTICLE");
    $stm -> execute();
    $total_article=$stm->fetch(PDO::FETCH_ASSOC);

    $stm=$pdo -> prepare("select count(ID_FOURNISSEUR) as total_fournisseur from FOURNISSEUR");
    $stm -> execute();
    $total_fournisseur=$stm->fetch(PDO::FETCH_ASSOC);

    $stm=$pdo -> prepare("select count(distinct ID_FOURNISSEUR) as fournisseur_actif from ARTICLE");
    $stm -> execute();
    $fournisseur_actif=$stm->fetch(PDO::FETCH_ASSOC);

    $stm=$pdo -> prepare("select sum(NBR_EN_STOCK * PRIX) as somme_prix from ARTICLE");
    $stm -> execute();
    $somme_prix=$stm->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Page d'acceuil</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="bootstrap-5.1.3-dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="bootstrap-5.1.3-dist/js/bootstrap.bundle.min.js"></script>
</head>
<body style="background: #edf2f7">
<?php require_once("navbar.php");?>

<div class="container text-center">    
  <h1>Gestion de Stocks</h1>
  <h3>Page d'acceuil</h3><br><br>
    <h3>
     <?= date('l d M Y') ?>
    </h3>
<hr>
  <div class="row">
    <div class="col-sm-4">
    <a href="afficher_article.php">
      <img src="icons/articles.png" class="img-responsive" style="width:100%">
    </a>
<br>
<br>
    <a href="afficher_fournisseur.php">
      <img src="icons/fournisseurs.png" class="img-responsive" style="width:100%">
    </a>    
    </div>
    <div class="col-sm-4">
    <strong> Nombre de fournisseur</strong>
    <div class="border border-secondary rounded-3 border-3">
        <h3><?= $total_fournisseur["total_fournisseur"] ?></h3>
      </div>
      <br>
      <br>
    <strong> Nombre de fournisseur actif</strong>
      <div class="border border-secondary rounded-3 border-3">
        <h3><?= $fournisseur_actif["fournisseur_actif"] ?></h3  >
      </div>
    </div>
    <div class="col-sm-4">
        <strong>Nombre d'article en stock</strong>
      <div class="border border-secondary rounded-3 border-3">
        <h3><?= $total_article["total_article"] ?></h3>
      </div>
      <br>
      <br>
        <strong>Somme des articles</strong>
      <div class="border border-secondary rounded-3 border-3">
       <h3><?= $somme_prix["somme_prix"] ?> dh</h3>
      </div>
    </div>
  </div>
</div>
<hr>
<img style="float: right;" src="icons/emsi-logo.png" >

</body>
</html>