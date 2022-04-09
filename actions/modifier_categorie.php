<?php
require_once("connexion_db.php");
if(isset($_POST["btnModif"])){
    // Action de modification de catégorie de la BBD
    $stm=$pdo->prepare("update CATEGORIE set NOM=:nom, DESCRIPTION=:description where ID_CAT=:id_cat");
    $stm -> execute(array(
        ":id_cat"=>$_POST["id"],
        ":nom"=>$_POST["nom"],
        ":description"=>$_POST["description"]
        ));
}
header("location:../afficher_categorie.php");
?>