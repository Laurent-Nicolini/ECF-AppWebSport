<?php
session_start();
$idstructure = $_GET['idstructure'];
$partenaire = $_GET['users_id'];

if(!isset($_POST['boissons'])) { $boissons = 0;} else { $boissons = 1;}
if(!isset($_POST['planning'])) { $planning = 0;} else { $planning = 1;}
if(!isset($_POST['newsletter'])) { $newsletter = 0;} else { $newsletter = 1;}

include_once 'connexionbdd.php'; 

$stt = $pdo->prepare("SELECT perm_boissons,perm_planning,perm_newsletter FROM structure WHERE id=:idstructure");
$stt->bindValue(":idstructure", $idstructure,PDO::PARAM_INT);
$stt->execute();
$requete = $stt->fetchAll(PDO::FETCH_OBJ);
foreach($requete as $requetes){

    if ($boissons != intval($requetes->perm_boissons)){
        if ($requetes->perm_boissons == 0){
        $statement = $pdo->prepare("UPDATE structure SET perm_boissons = 1 WHERE Id = :idstructure");
        $statement->bindValue(":idstructure", $idstructure, PDO::PARAM_INT);
        $statement->execute();
        $req = $statement->fetch(PDO::FETCH_OBJ);
    } else {
        $statement = $pdo->prepare("UPDATE structure SET perm_boissons = 0 WHERE Id = :idstructure");
        $statement->bindValue(":idstructure", $idstructure, PDO::PARAM_INT);
        $statement->execute();
        $req = $statement->fetch(PDO::FETCH_OBJ);
    }
    }   

    if ($planning != intval($requetes->perm_planning)){
        if ($requetes->perm_planning == 0){
        $statement = $pdo->prepare("UPDATE structure SET perm_planning = 1 WHERE Id = :idstructure");
        $statement->bindValue(":idstructure", $idstructure, PDO::PARAM_INT);
        $statement->execute();
        $req = $statement->fetch(PDO::FETCH_OBJ);
    } else {
        $statement = $pdo->prepare("UPDATE structure SET perm_planning = 0 WHERE Id = :idstructure");
        $statement->bindValue(":idstructure", $idstructure, PDO::PARAM_INT);
        $statement->execute();
        $req = $statement->fetch(PDO::FETCH_OBJ);
    }
    }

    if ($newsletter != intval($requetes->perm_newsletter)){
        if ($requetes->perm_newsletter == 0){
        $statement = $pdo->prepare("UPDATE structure SET perm_newsletter = 1 WHERE Id = :idstructure");
        $statement->bindValue(":idstructure", $idstructure, PDO::PARAM_INT);
        $statement->execute();
        $req = $statement->fetch(PDO::FETCH_OBJ);
    } else {
        $statement = $pdo->prepare("UPDATE structure SET perm_newsletter = 0 WHERE Id = :idstructure");
        $statement->bindValue(":idstructure", $idstructure, PDO::PARAM_INT);
        $statement->execute();
        $req = $statement->fetch(PDO::FETCH_OBJ);
    }
    }

    $_SESSION['permvalid'] = 1;
    header("Location: structure.php?idstructure=$idstructure&users_id=$partenaire");
    exit();
}