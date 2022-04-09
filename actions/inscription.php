<?php
require_once("connexion_db.php");
    if(isset($_POST["cnx"])){
        //connexion à la BD
        if(!empty($_POST["username"])&&!empty($_POST["password"])){
            $stm1=$pdo->prepare("select * from utilisateur WHERE LOGIN=?");
            $stm1->execute([$_POST["username"]]);
            if($stm1->rowCount()==0){
                    $stm2=$pdo->prepare("insert into utilisateur(LOGIN,MDP)
                    values(?,?)");
                    $stm2->execute([$_POST["username"],
                                password_hash($_POST["password"],PASSWORD_DEFAULT)]);
                    echo "Inscription effectuée avec succès";
                    
            }else{
                echo "Il y a déjà un compte avec le même email!!";
            }
        }else{
            echo "Les champs sont obligatoires !!";
        }
        
    }
    header("location:../page_login.php");
?>
