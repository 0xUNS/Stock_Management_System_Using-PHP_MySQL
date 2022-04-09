<?php
require_once("connexion_db.php");
if(isset($_POST["btnModif"])){
    // Action de modification d'article de la BBD
    $stm=$pdo->prepare("update ARTICLE set NOM=:nom, DESCRIPTION=:description, NBR_EN_STOCK=:nbr_stock, PRIX=:prix, 
                        ID_FOURNISSEUR=:fournisseur, ID_CAT=:categorie where ID_ARTICLE=:id_article");
    $stm -> execute(array(
        ":id_article"=>$_POST["id"],
        ":nom"=>$_POST["nom"],
        ":description"=>$_POST["description"],
        ":nbr_stock"=>$_POST["nbr_stock"],
        ":prix"=>$_POST["prix"],
        ":fournisseur"=>$_POST["fournisseur"],
        ":categorie"=>$_POST["categorie"]
        )
    );
}
header("location:../afficher_article.php");
?>