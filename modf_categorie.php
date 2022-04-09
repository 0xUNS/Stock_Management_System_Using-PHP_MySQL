<?php
  require_once("actions/connexion_db.php");

  $stm=$pdo -> prepare("select * from CATEGORIE WHERE ID_CAT=?");
  $stm -> execute([$_GET["id"]]);
  $categ=$stm->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>catégorie</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="bootstrap-5.1.3-dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="bootstrap-5.1.3-dist/js/bootstrap.bundle.min.js"></script>
</head>
<body style="background: #edf2f7">
<?php require_once("navbar.php"); ?>
<div class="container mt-5">
</form>
  <h2>Modifier une categorie</h2>
  <form action="actions/modifier_categorie.php" method="POST" class="was-validated">

    <input type="hidden" name="id" value="<?= $categ["ID_CAT"]?>">

  <div class="mb-3 mt-5">
      <label class="form-label">Nom:</label>
      <input type="text"name="nom" value="<?= $categ["NOM"]?>"  class="form-control" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Description:</label>
      <textarea name="description" class="form-control" required><?= $categ["DESCRIPTION"]?></textarea>
    </div>

  <button type="submit" name="btnModif" value="Envoyer" class="btn btn-primary" style="color:black"><img src="icons/check.png" width="20px" height="20px"> Enregister</button>
  <button type="reset" class="btn btn-default"><img src="icons/cancel.png" width="20px" height="20px"> Annuler</button>
</form>
</div>
</body>
</html>