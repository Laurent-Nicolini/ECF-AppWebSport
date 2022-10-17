<?php
if (isset($_POST["role"])){
    include "connexionbdd.php";
    $email = $_POST['email'];
    $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = $_POST['role'];
    $statement = $pdo->prepare(
        "INSERT INTO users (email, password, role) 
        VALUES (:email, :password, :role)"
    );
    $statement->bindValue(':email', $email, PDO::PARAM_STR);
    $statement->bindValue(':password', $pass, PDO::PARAM_STR);
    $statement->bindValue(':role', $role, PDO::PARAM_STR);
    $sttuser = $statement->execute();
    if ($sttuser){
        $statement2 = $pdo->prepare(
            "SELECT id FROM users WHERE email=:email"
        );
        $statement2->bindValue(':email', $email, PDO::PARAM_STR);
        $statement2->execute();
        $usersid = $statement2->fetch(PDO::FETCH_OBJ);
        setcookie('idfranchise',$usersid->id);
        $_COOKIE["idfranchise"] = $usersid->id;
        header('Location: addpart.php?ajout=franchise');
    }
    
} elseif (isset($_POST["nom"])) {
    include "connexionbdd.php";
    $idfranchise = $_COOKIE['idfranchise'];
    $nom = $_POST['nom'];
    $active = $_POST['active'];
    $requete = $pdo->prepare(
        "INSERT INTO franchise (nom, users_id, active) 
        VALUES (:nom, :idfranchise, :active)"
    );
    $requete->bindValue(':nom', $nom, PDO::PARAM_STR);
    $requete->bindValue(':idfranchise', $idfranchise, PDO::PARAM_INT);
    $requete->bindValue(':active', $active, PDO::PARAM_INT);
    $sttfranchise = $requete->execute();
    if ($sttfranchise){
        $statement3 = $pdo->prepare(
            "SELECT id FROM franchise WHERE nom=:nom"
        );
        $statement3->bindValue(':nom', $nom, PDO::PARAM_STR);
        $statement3->execute();
        $franchid = $statement3->fetch(PDO::FETCH_OBJ);
        setcookie('idstructure', $franchid->id);
        $_COOKIE["idstructure"] = $franchid->id;
        header('Location: addpart.php?ajout=structure');
    }
    

} elseif (isset($_POST["adresse"])){
    include "connexionbdd.php";
    $idstructure = $_COOKIE["idstructure"];
    $adresse = $_POST['adresse'];
    $text_court = $_POST['text_court'];
    $req = $pdo->prepare(
        "INSERT INTO structure (text_court, adresse, franchise_id) 
        VALUES (:text_court, :adresse, :idstructure)"
    ); 
    $req->bindValue(':text_court', $text_court, PDO::PARAM_STR);
    $req->bindValue(':adresse', $adresse, PDO::PARAM_STR);
    $req->bindValue(':idstructure', $idstructure, PDO::PARAM_INT);
    $req->execute();
    header('Location: addpart.php?ajout=valider');
}
;

?>