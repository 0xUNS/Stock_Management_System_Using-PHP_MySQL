<?php
    require_once("connexion_db.php");
    $stm=$pdo -> prepare("delete from CATEGORIE where ID_CAT=?");
    $stm -> execute([$_GET["id"]]);
    header("location:../afficher_categorie.php");
?>