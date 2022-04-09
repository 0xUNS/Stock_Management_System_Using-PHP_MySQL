<?php
require_once("connexion_db.php");
if(isset($_POST["btnEnvoyer"])){
    $stm=$pdo ->prepare("insert into FOURNISSEUR(CIN , NOM, PRENOM, ADRESSE, TELEPHONE, EMAIL)
                            values(:cin, :nom, :prenom, :adresse, :telephone, :email)");
    $stm -> execute([":cin"=>$_POST["cin"],
                    ":nom"=>$_POST["nom"],
                    ":prenom"=>$_POST["prenom"],
                    ":adresse"=>$_POST["adresse"],
                    ":telephone"=>$_POST["telephone"],
                    ":email"=>$_POST["email"]
                    ]);
}
header("location:../afficher_fournisseur.php");
?>