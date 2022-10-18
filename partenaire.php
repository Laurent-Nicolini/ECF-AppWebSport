<?php
session_start();
if (!isset($_SESSION['email'])){
    header('Location:login.php');
    exit();
}
$partenaire = $_GET['users_id'];
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
    <?php
        include_once 'connexionbdd.php';
        $statement = $pdo->prepare(
            "SELECT * FROM franchise
            INNER JOIN structure ON franchise.id=franchise_id
            WHERE users_id = $partenaire"
        );
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_OBJ);
    ?>
    <h2 class="text-center">Partenaire:</h2>

    <div class="container d-flex flex-wrap justify-content-around">
            <?php
                foreach($result as $results){ ?>
                    
                        <div class='card mx-3 my-3' style='width: 18rem;'>
                        <img class='card-img-top' src='haltere.jpg' alt='Card image cap'>
                        <p class='card-text text-white text-center' <?php if ($results->active == 1){ echo "style='background-color: #34C924;'>ACTIF";} else { echo "style='background-color: #DB3A00;'>INACTIF";}?></p>
                        <div class='card-body'>
                        <h5 class='card-title'>Nom:<?= $results->Nom ?></h5>
                        <p class='card-text'><?= $results->text_court ?></p>
                        <p class='card-text'>Adresse:<?= $results->adresse ?></p>
                        <h5>Permissions du Partenaire</h5>
                        <div class='form-check form-switch'>
                        <input class='form-check-input' name='boissons' type='checkbox' id='flexSwitchCheckDefault' <?php if($results->perm_boissons == 1){ echo "checked"; } else {echo "";}?>>
                        <label class='form-check-label' for='flexSwitchCheckDefault'>Vendre des boissons</label>
                        </div>
                        <div class='form-check form-switch'>
                        <input class='form-check-input' name='plannings' type='checkbox' id='flexSwitchCheckDefault' <?php if($results->perm_planning == 1){ echo "checked"; } else {echo "";}?>>
                        <label class='form-check-label' for='flexSwitchCheckDefault'>Gérer les plannings d'équipe</label>
                        </div>
                        <div class='form-check form-switch'>
                        <input class='form-check-input' name='newsletter' type='checkbox' id='flexSwitchCheckDefault' <?php if($results->perm_newsletter == 1){ echo "checked"; } else {echo "";}?>>
                        <label class='form-check-label' for='flexSwitchCheckDefault'>Gestion des Newsletter</label>
                        </div>
                        </div>
                        </div>
            <?php }?>
    </div>
 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>