<?php
// Supprimer un article de la BBD
    require_once("connexion_db.php");
    $stm=$pdo -> prepare("delete from ARTICLE where ID_ARTICLE=?");
    $stm -> execute([$_GET["id"]]);
    header("location:../afficher_article.php");
?>