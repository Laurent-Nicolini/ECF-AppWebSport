<?php
session_start();
include_once('validlogin.php');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration App Web Sport</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php require_once 'menu.php' ?>

    <main>
        <h2 class="text-center">Liste de tous les partenaires</h2>
        <div class="d-flex justify-content-evenly">
            <a href="allusers.php?filtre=none"><button class="text-white rounded">Tous les Partenaires</button></a>
            <a href="allusers.php?filtre=1"><button class="text-white rounded">Partenaires Actifs</button></a>
            <a href="allusers.php?filtre=0"><button class="text-white rounded">Partenaires Inactifs</button></a>
        </div>
        <?php
        //include_once 'connexionbdd.php';
        if ($_GET['filtre'] >= 1){
            include 'filter_active.php';
            // $statement = $pdo->prepare(
            //         "SELECT * FROM users 
            //         INNER JOIN franchise ON users.id=users_id 
            //         INNER JOIN structure ON franchise.id=franchise_id
            //         WHERE role = 0 AND active = 1"
            //         );

            // $statement->execute();
            // $result = $statement->fetchAll(PDO::FETCH_OBJ);
        }elseif($_GET['filtre'] === '0'){
            include 'filter_inactive.php';
        //     $statement = $pdo->prepare(
        //         "SELECT * FROM users 
        //         INNER JOIN franchise ON users.id=users_id 
        //         INNER JOIN structure ON franchise.id=franchise_id
        //         WHERE role = 0 AND active = 0"
        //         );

        // $statement->execute();
        // $result = $statement->fetchAll(PDO::FETCH_OBJ);
        } else {
            include 'filter_allusers.php';
        //     $statement = $pdo->prepare(
        //         "SELECT * FROM users 
        //         INNER JOIN franchise ON users.id=users_id 
        //         INNER JOIN structure ON franchise.id=franchise_id
        //         WHERE role = 0"
        //         );

        // $statement->execute();
        // $result = $statement->fetchAll(PDO::FETCH_OBJ);
        }
        ?>
        <br>
        <div class="container d-flex justify-content-around flex-wrap">
        <?php
        foreach($result as $results){
            if ($results->active == 1){
            echo "<div class='card mx-3 my-3' style='width: 18rem; height:40rem;'>
            <img class='card-img-top' src='haltere.jpg' alt='Card image cap'>
            <p class='card-text text-white text-center' style='background-color: #34C924;'>ACTIF</p>
            <div class='card-body'>
              <a href='partenaire.php?users_id=$results->users_id'><h5 class='card-title text-center'>$results->Nom</h5></a>
              <p class='card-text'>ID Client: $results->users_id</p>
              <p class='card-text'>Email: $results->Email</p>
              <p class='card-text'>$results->text_court</p>
              <p class='card-text'>Adresse: $results->adresse</p>
            </div>
          </div>";
            } else {
                echo "<div class='card mx-3 my-3' style='width: 18rem;'>
            <img class='card-img-top' src='haltere.jpg' alt='Card image cap'>
            <p class='card-text text-white text-center' style='background-color: #DB3A00;'>INACTIF</p>
            <div class='card-body'>
              <a href='partenaire.php?users_id=$results->users_id'><h5 class='card-title text-center'>$results->Nom</h5></a>
              <p class='card-text'>ID Client: $results->users_id</p>
              <p class='card-text'>Email: $results->Email</p>
              <p class='card-text'>$results->text_court</p>
              <p class='card-text'>Adresse: $results->adresse</p>
            </div>
          </div>";
            }
        }
        ?>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>