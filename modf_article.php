<?php
    require_once("actions/connexion_db.php");

    $stm1=$pdo -> prepare("select ID_CAT, NOM from CATEGORIE");
    $stm1 -> execute();
    $tab_cat=$stm1->fetchAll(PDO::FETCH_ASSOC);

    $stm2=$pdo -> prepare("select ID_FOURNISSEUR, NOM, PRENOM from FOURNISSEUR");
    $stm2 -> execute();
    $tab_fourn=$stm2->fetchAll(PDO::FETCH_ASSOC);

    $stm3=$pdo -> prepare("select * from ARTICLE WHERE ID_ARTICLE=?");
    $stm3 -> execute([$_GET["id"]]);
    $article=$stm3->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Article</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="bootstrap-5.1.3-dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="bootstrap-5.1.3-dist/js/bootstrap.bundle.min.js"></script>
</head>
<body style="background: #edf2f7">
<?php require_once("navbar.php"); ?>

<div class="container mt-5">

<h3>Modifier un article</h3>
<form action="actions/modifier_article.php" method="POST" class="was-validated">

    <input type="hidden" name="id" value="<?= $article["ID_ARTICLE"]?>">

    <div class="mb-3 mt-5">
      <label class="form-label">Nom:</label>
      <input type="text" name="nom" value="<?= $article["NOM"]?>" class="form-control" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Description:</label>
      <textarea name="description" class="form-control" required><?= $article["DESCRIPTION"]?></textarea>
    </div>

  <div class="row mb-3">
      <div class="col">
        <label class="form-label">Prix:</label>
        <input type="number" name="prix" value="<?= $article["PRIX"]?>" min="0" class="form-control" required>
      </div>

      <div class="col">
        <label class="form-label">Quantité:</label>
        <input type="number" name="nbr_stock" value="<?= $article["NBR_EN_STOCK"]?>" min="0" class="form-control" required>
      </div>
    </div>


    <div class="row mb-3">
      <div class="col">
      <label class="form-label">Fournisseur:</label>
        <select name="fournisseur" class="form-select" required>
        <?php
          // Liste qui contient Les noms des fournisseurs
          foreach($tab_fourn as $valeur){
            echo '<option  value="'.$valeur["ID_FOURNISSEUR"].'" ';
            if($article["ID_FOURNISSEUR"] == $valeur["ID_FOURNISSEUR"])
              echo 'selected'; //Selectionner la valeur par default (Ancienne valeur du fournisseur)
            echo '>'.$valeur["NOM"].' '.$valeur["PRENOM"].'</option>';
          }
        ?>
        </select>
      </div>

      <div class="col">
      <label class="form-label">Catégorie:</label>
        <select name="categorie" class="form-select" required>
        <?php
            // Liste qui contient Les noms des catégories
            foreach($tab_cat as $valeur){
              echo '<option value="'.$valeur["ID_CAT"].'" ';
              if($article["ID_CAT"] == $valeur["ID_CAT"])
                echo 'selected'; //Selectionner la valeur par default (Ancienne valeur de la catégorie)
              echo '>'.$valeur["NOM"].'</option>';
            }
          ?>
        </select>
    </div>
</div>

  <div class="btn-group">
      <button type="submit" class="btn btn-primary active"><img src="icons/check.png" width="20px" height="20px">  Envoyer</button>
      <button type="reset" class="btn btn-primary"><img src="icons/cancel.png" width="20px" height="20px"> Annuler</button>
  </div>
</form>

</body>
</html>