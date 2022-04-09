<?php
  require_once("actions/connexion_db.php");

  $stm=$pdo -> prepare("select * from FOURNISSEUR WHERE ID_FOURNISSEUR=?");
  $stm -> execute([$_GET["id"]]);
  $fournisseur=$stm->fetch(PDO::FETCH_ASSOC);
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
<body>
    <?php require_once("navbar.php"); ?>
<div class="container mt-5">
  <h2>Fournisseur</h2>
  <form action="actions/modifier_fournisseur.php" method="POST" class="was-validated">

  <input type="hidden" name="id" value="<?= $fournisseur["ID_FOURNISSEUR"];?>">





  <div class="mb-3 mt-5">
      <label class="form-label">CIN:</label>
      <input type="text" name="cin" value="<?= $fournisseur["CIN"];?>" class="form-control" required>
    </div>

    <div class="row mb-3">
      <div class="col">
        <label class="form-label">Nom:</label>
        <input type="text" name="nom" value="<?= $fournisseur["NOM"];?>" class="form-control"required>
      </div>

      <div class="col">
        <label class="form-label">Prénom:</label>
        <input type="text" name="prenom" value="<?= $fournisseur["PRENOM"];?>" class="form-control" required>
      </div>
    </div>

    <div class="mb-3">
      <label class="form-label">Adresse:</label>
      <textarea name="adresse" class="form-control" required><?= $fournisseur["ADRESSE"];?></textarea>
    </div>

    <div class="row mb-3">
      <div class="col">
        <label class="form-label">Téléphone:</label>
        <input type="text" name="telephone" value="<?= $fournisseur["TELEPHONE"];?>" class="form-control" required>
      </div>

      <div class="col">
        <label class="form-label">Email:</label>
        <input type="email" name="email" value="<?= $fournisseur["EMAIL"];?>" class="form-control" required>
      </div>
    </div>


  <div class="btn-group">
      <button type="submit" class="btn btn-primary active"><img src="icons/check.png" width="20px" height="20px">  Envoyer</button>
      <button type="reset" class="btn btn-primary"><img src="icons/cancel.png" width="20px" height="20px"> Annuler</button>
  </div>
</form>
</div>
</body>
</html>