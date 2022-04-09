<?php
require_once("connexion_db.php");
if(isset($_POST["btnEnvoyer"])){  
    $stm=$pdo ->prepare("insert into CATEGORIE(NOM, DESCRIPTION)
    values(:nom, :description)");
    $stm -> execute([":nom"=>$_POST["nom"], ":description"=>$_POST["description"]]);
}
header("location:../afficher_categorie.php");
?>