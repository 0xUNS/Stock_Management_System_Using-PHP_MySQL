<?php
require_once("connexion_db.php");
if(isset($_POST["btnEnvoyer"])){
    $tailleMax=5*1024*1024;
    if($_FILES["imageArticle"]["size"]<$tailleMax){
           $types=["image/jpg","image/jpeg","image/png","image/gif"];
           if(in_array($_FILES["imageArticle"]["type"],$types)){
               if($_FILES["imageArticle"]["error"]==0){
                    $extension=pathinfo($_FILES["imageArticle"]["name"],PATHINFO_EXTENSION);
                    $nom_image="images/".uniqid("ARTICLE_",true).'.'.$extension;
                    
                    move_uploaded_file($_FILES["imageArticle"]["tmp_name"],'../'.$nom_image);

                    // Action d'ajout des données à la BBD avec la methode POST
                    $stm=$pdo ->prepare("insert into ARTICLE(NOM, DESCRIPTION, NBR_EN_STOCK, PRIX, IMAGE, ID_FOURNISSEUR, ID_CAT)
                    values(:nom, :description, :nbr_stock, :prix, :image, :fournisseur, :categorie)");
                    $stm -> execute([
                        ":nom"=>$_POST["nom"],
                        ":description"=>$_POST["description"],
                        ":nbr_stock"=>$_POST["nbr_stock"],
                        ":prix"=>$_POST["prix"],
                        ":image"=>$nom_image,
                        ":fournisseur"=>$_POST["fournisseur"],
                        ":categorie"=>$_POST["categorie"]]);
                }else{
                    echo "Erreur de l'envoi du fichier";
                }
            }else{
                echo "Le type de fichier non supporté";
            }
    }else{
        echo "la taille de l'image est supérieur à 5M";
    }
}
header("location:../afficher_article.php");
?>