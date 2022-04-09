<?php
    require_once("connexion_db.php");
    $stm=$pdo -> prepare("delete from FOURNISSEUR where ID_FOURNISSEUR=?");
    $stm -> execute([$_GET["id"]]);
    header("location:../afficher_fournisseur.php");
?>