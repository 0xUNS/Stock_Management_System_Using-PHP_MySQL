<?php
require_once("connexion_db.php");
 if(isset($_POST["cnx"])){
    $stm=$pdo->prepare("select * from utilisateur where LOGIN=?");
    $stm->execute([$_POST["username"]]);
    $result=$stm->fetch(PDO::FETCH_ASSOC);
    if($result!=false && password_verify($_POST["password"],$result["MDP"])==true){
        session_start();
        $_SESSION["username"]=$_POST["username"];
        $_SESSION["password"]=$result["MDP"];
        echo "Bienvenue vous êtes connecté";
        header("location:../page_acceuil.php");

    }else{
        echo "Email ou mot de passe incorrect !!";
        echo "<script type ='text/JavaScript'>";  
        echo "alert('Email ou mot de passe incorrect !!')";  
        echo "</script>";
        header("location:../page_login.php");
    }
}
?>
