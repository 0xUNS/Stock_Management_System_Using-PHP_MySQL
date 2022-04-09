<?php
  // Extraire les informations de la BDD
    require_once("actions/connexion_db.php");
    $stm=$pdo -> prepare("select A.*, C.NOM as NOM_CATEG, F.NOM as NOM_FOURNISSEUR, F.PRENOM as PRENOM_FOURNISSEUR from ARTICLE A 
    inner join CATEGORIE C on A.ID_CAT = C.ID_CAT
    inner join FOURNISSEUR F on A.ID_FOURNISSEUR = F.ID_FOURNISSEUR
    where ID_ARTICLE=?");
    $stm -> execute([$_GET["id"]]);
    $article=$stm->fetch(PDO::FETCH_ASSOC); //Le nom et description de la catégorie {{ID_ARTICLE}}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Articles</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="bootstrap-5.1.3-dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="bootstrap-5.1.3-dist/js/bootstrap.bundle.min.js"></script>
</head>
<body style="background: #edf2f7">
<?php require_once("navbar.php");?>

<div class="container mt-3" style="width:400px">
  <h2 class="text-center"><?= $article["NOM"] ?></h2>
  <div class="card rounded-3 border-3">
    <img class="card-img-top" src="<?= $article["IMAGE"] ?>" style="width:100%">
    <div class="card-img-overlay">
    <p style="float:right">x <?= $article["NBR_EN_STOCK"] ?></p>
  </div>
  <div class="card card-body border-0">
    <h3 class="card-title"><?= $article["PRIX"] ?> DH</h3>
    <p class="card-text"><?= $article["DESCRIPTION"] ?></p>
    <div class="card-footer d-grid gap-3">
      <a href="info_fournisseur.php?id=<?= $article["ID_FOURNISSEUR"]?>" class="btn btn-outline-dark btn-sm"> <?= $article["NOM_FOURNISSEUR"] ?>  <?= $article["PRENOM_FOURNISSEUR"] ?> </a>
      <a href="info_categorie.php?id=<?= $article["ID_CAT"]?>" class="btn btn-outline-dark btn-sm"><?= $article["NOM_CATEG"] ?></a>
    </div>
  </div>
  </div>

</body>
</html>