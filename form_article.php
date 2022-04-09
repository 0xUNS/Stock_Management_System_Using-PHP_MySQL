<?php
  require_once("actions/connexion_db.php");
    $stm=$pdo -> prepare("select ID_CAT, NOM from CATEGORIE");
    $stm -> execute();
    $tab_cat=$stm->fetchAll(PDO::FETCH_ASSOC);

    $stm=$pdo -> prepare("select ID_FOURNISSEUR, NOM, PRENOM from FOURNISSEUR");
    $stm -> execute();
    $tab_fourn=$stm->fetchAll(PDO::FETCH_ASSOC);
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

  <h3>Article</h3>

  <form action="actions/ajouter_article.php" method="POST" enctype="multipart/form-data" class="was-validated">
    <div class="mb-3 mt-5">
      <label class="form-label">Nom:</label>
      <input type="text" name="nom" class="form-control" required>
      <div class="valid-feedback">Valide.</div>
      <div class="invalid-feedback">Veuillez remplir ce champ.</div>
    </div>

    <div class="mb-3">
      <label class="form-label">Description:</label>
      <textarea name="description" class="form-control" required></textarea>
    </div>



    <div class="row mb-3">
      <div class="col">
        <label class="form-label">Prix:</label>
        <input type="number" name="prix" min="0" class="form-control" required>
      </div>

      <div class="col">
        <label class="form-label">Quantité:</label>
        <input type="number" name="nbr_stock" min="0" class="form-control" required>
      </div>
    </div>

    <div class="row mb-3">
      <div class="col">
      <label class="form-label">Fournisseur:</label>
        <select name="fournisseur" class="form-select" required>
            <?php
            // Liste qui contient Les noms des fournisseurs
            foreach($tab_fourn as $valeur){
            echo '<option  value="'.$valeur["ID_FOURNISSEUR"].'">'.$valeur["NOM"].' '.$valeur["PRENOM"].'</option>';
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
            echo '<option value="'.$valeur["ID_CAT"].'">'.$valeur["NOM"].'</option>';
            }
            ?>
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Choisir une image</label>
        <input type="file" name="imageArticle" class="form-control" required>
    </div>
</div>

    <div class="btn-group">
    <button type="submit" class="btn btn-primary active"><img src="icons/check.png" width="20px" height="20px">  Envoyer</button>
    <button type="reset" class="btn btn-primary"><img src="icons/cancel.png" width="20px" height="20px"> Annuler</button>
    </div>
</form>

</body>
</html>