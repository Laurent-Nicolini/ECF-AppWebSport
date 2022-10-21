<?php
var_dump($_GET);
$idstructure = $_GET['idstructure'];
$partenaire = $_GET['users_id'];

include_once 'connexionbdd.php'; 

$stt = $pdo->prepare("SELECT perm_boissons,perm_planning,perm_newsletter FROM structure WHERE id=:idstructure");
$stt->bindValue(":idstructure", $_GET['idstructure'],PDO::PARAM_INT);
$stt->execute();
$requete = $stt->fetchAll(PDO::FETCH_OBJ);
foreach($requete as $requetes){

    if ($_POST['boissons'] != $requetes->perm_boissons){
        if ($requetes->perm_boissons == 0){
        $statement1 = $pdo->prepare("UPDATE structure SET perm_boissons = 1 WHERE Id = :idstructure");
        $statement1->bindValue(":idstructure", $_GET['idstructure'], PDO::PARAM_INT);
        $statement1->execute();
        $req1 = $statement1->fetch(PDO::FETCH_OBJ);
    } else {
        $statement2 = $pdo->prepare("UPDATE structure SET perm_boissons = 0 WHERE Id = :idstructure");
        $statement2->bindValue(":idstructure", $_GET['idstructure'], PDO::PARAM_INT);
        $statement2->execute();
        $req2 = $statement2->fetch(PDO::FETCH_OBJ);
    }
    }

    if ($_POST['planning'] != $requetes->perm_planning){
        if ($requetes->perm_planning == 0){
        $statement3 = $pdo->prepare("UPDATE structure SET perm_planning = 1 WHERE Id = :idstructure");
        $statement3->bindValue(":idstructure", $_GET['idstructure'], PDO::PARAM_INT);
        $statement3->execute();
        $req3 = $statement3->fetch(PDO::FETCH_OBJ);
    } else {
        $statement4 = $pdo->prepare("UPDATE structure SET perm_planning = 0 WHERE Id = :idstructure");
        $statement4->bindValue(":idstructure", $_GET['idstructure'], PDO::PARAM_INT);
        $statement4->execute();
        $req4 = $statement4->fetch(PDO::FETCH_OBJ);
    }
    }

    if ($_POST['newsletter'] != $requetes->perm_newsletter){
        if ($requetes->perm_newsletter == 0){
        $statement5 = $pdo->prepare("UPDATE structure SET perm_newsletter = 1 WHERE Id = :idstructure");
        $statement5->bindValue(":idstructure", $_GET['idstructure'], PDO::PARAM_INT);
        $statement5->execute();
        $req5 = $statement5->fetch(PDO::FETCH_OBJ);
    } else {
        $statement6 = $pdo->prepare("UPDATE structure SET perm_newsletter = 0 WHERE Id = :idstructure");
        $statement6->bindValue(":idstructure", $_GET['idstructure'], PDO::PARAM_INT);
        $statement6->execute();
        $req6 = $statement6->fetch(PDO::FETCH_OBJ);
    }
    }
    header("Location: structure.php?idstructure=$idstructure&users_id=$partenaire&permvalid=oui");
    exit();
}