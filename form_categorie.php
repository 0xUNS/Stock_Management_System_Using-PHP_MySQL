<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="bootstrap-5.1.3-dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="bootstrap-5.1.3-dist/js/bootstrap.bundle.min.js"></script>
</head>
<body style="background: #edf2f7">
<?php require_once("navbar.php"); ?>
<div class="container mt-5">
<h3>Categorie</h3>

<form action="actions/ajouter_categorie.php" method="POST" class="was-validated">
    <div class="mb-3 mt-5">
      <label class="form-label">Nom:</label>
      <input type="text" class="form-control" name="nom" required>
      <div class="valid-feedback">Valide.</div>
      <div class="invalid-feedback">Veuillez remplir ce champ.</div>
    </div>

    <div class="mb-3">
      <label class="form-label">Description:</label>
      <textarea class="form-control" name="description" required></textarea>
    </div>

    <div class="btn-group">
      <button type="submit" class="btn btn-primary active"><img src="icons/check.png" width="20px" height="20px">  Envoyer</button>
      <button type="reset" class="btn btn-primary"><img src="icons/cancel.png" width="20px" height="20px"> Annuler</button>
    </div>
</form>
</div>
</body>
</html>