<?php
require_once("connexion_db.php");
if(isset($_POST["btnModif"])){
    // Action de modification de fournisseur de la BBD
    $stm=$pdo->prepare("update FOURNISSEUR set CIN=:cin, NOM=:nom, PRENOM=:prenom, ADRESSE=:adresse, TELEPHONE=:telephone, 
                        EMAIL=:email where ID_FOURNISSEUR=:id_fournisseur");
    $stm -> execute(array(
        ":id_fournisseur"=>$_POST["id"],
        ":cin"=>$_POST["cin"],
        ":nom"=>$_POST["nom"],
        ":prenom"=>$_POST["prenom"],
        ":adresse"=>$_POST["adresse"],
        ":telephone"=>$_POST["telephone"],
        ":email"=>$_POST["email"]
        ));
}
header("location:../afficher_fournisseur.php");
?>