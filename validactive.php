<?php
$partenaire = $_GET['users_id'];

include_once 'connexionbdd.php'; 

$stt = $pdo->prepare("SELECT active FROM franchise WHERE users_id=:users_id");
$stt->bindValue(":users_id", $partenaire,PDO::PARAM_INT);
$stt->execute();
$requete = $stt->fetchAll(PDO::FETCH_OBJ);
foreach($requete as $requetes){
    
    if ($_POST['active'] != $requetes->active){
        if($requetes->active == 0){
            $stt = $pdo->prepare("UPDATE franchise SET active = 1 WHERE users_id=:users_id");
            $stt->bindValue(":users_id", $partenaire, PDO::PARAM_INT);
            $stt->execute();
            $requete = $stt->fetch(PDO::FETCH_OBJ);
        } else{
            $stt = $pdo->prepare("UPDATE franchise SET active = 0 WHERE users_id=:users_id");
            $stt->bindValue(":users_id", $partenaire, PDO::PARAM_INT);
            $stt->execute();
            $requete = $stt->fetch(PDO::FETCH_OBJ);
        }
        
    }
    
}
header("Location: partenaire.php?users_id=$partenaire");
exit();