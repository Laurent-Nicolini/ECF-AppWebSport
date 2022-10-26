<?php
session_start();
$partenaire = $_SESSION['users_id'];
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
            INNER JOIN structure ON franchise.Id=franchise_id
            WHERE users_id = :partenaire"
        );
        $statement->bindValue(':partenaire',$partenaire,PDO::PARAM_INT);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_OBJ);

    ?>
    <h2 class="text-center">Partenaire:</h2>
    <?php
    $statement2 = $pdo->prepare(
            "SELECT active FROM franchise
            WHERE users_id = :partenaire"
        );
    $statement2->bindValue(":partenaire", $partenaire, PDO::PARAM_INT);
    $statement2->execute();
    $result2 = $statement2->fetchAll(PDO::FETCH_OBJ);
    ?>
        <!-- Options Activité Partenaire -->
    <?php foreach ($result2 as $results2){ ?>
    <form class='text-center' action='validactive.php?users_id=<?=$partenaire?>' method='POST' name='form_active'>
        <p class="text-center">Définir l'activité du Partenaire:</p>
        <div class="form-check form-check-inline">
            <input class="form-check-input radio1" type="radio" name="active" id="inlineRadio1" value="1" <?php if ($_SESSION['role'] == 0){ echo" disabled ";}?>>
            <label class="form-check-label" for="inlineRadio1">Actif</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input radio2" type="radio" name="active" id="inlineRadio2" value="0" <?php if ($_SESSION['role'] == 0){ echo" disabled ";}?>>
            <label class="form-check-label" for="inlineRadio2">Inactif</label>
        </div>
        <?php if ($_SESSION['role'] == 1){ echo" 
            <button class='btn submitactive mx-auto' type='submit'>Mise à Jour Partenaire</button>";}?>
        </form>
    <?php } ?>
        <br>
        <div class="container d-flex flex-wrap justify-content-around">
            <?php
            /* Boucle sur le résultat des franchises dans la BDD */
                foreach($result as $results){ $structureid = $results->Id ;?>
                        
                        <div class='card mx-3 my-3' style='width: 18rem;'>
                        <img class='card-img-top' src='haltere.jpg' alt='Card image cap'>
                        <p class='card-text text-white text-center' <?php if ($results->active == 1){ echo "style='background-color: #34C924;'>ACTIF";} else { echo "style='background-color: #DB3A00;'>INACTIF";}?></p>
                        <div class='card-body'>
                            <?php if ($_SESSION['role'] == 1){ echo"
                        <a href='structure.php?idstructure=$structureid&users_id=$partenaire'>";}?><h5 class='card-title'>Nom: <?= $results->Nom ?></h5><?php if ($_SESSION['role'] == 1){ echo"</a>";}?>
                        <p class='card-text'><?= $results->text_court ?></p>
                        <p class='card-text'>Adresse: <?= $results->adresse ?></p>

                        <!-- Permissions du partenaire en lecture seule sur cette page -->
                        <h5>Permissions du Partenaire</h5>
                        <div class='form-check form-switch'>
                        <input class='form-check-input' name='boissons' type='checkbox' id='switchperm1'<?php if($results->perm_boissons == 1){ echo " checked "; } else {echo " ";}?> disabled>
                        <label class='form-check-label' for='flexSwitchCheckDefault'>Vendre des boissons</label>
                        </div>
                        <div class='form-check form-switch'>
                        <input class='form-check-input' name='plannings' type='checkbox' id='switchperm2'<?php if($results->perm_planning == 1){ echo " checked "; } else {echo " ";}?> disabled>
                        <label class='form-check-label' for='flexSwitchCheckDefault'>Gérer les plannings d'équipe</label>
                        </div>
                        <div class='form-check form-switch'>
                        <input class='form-check-input' name='newsletter' type='checkbox' id='switchperm3'<?php if($results->perm_newsletter == 1){ echo " checked "; } else {echo " ";}?> disabled>
                        <label class='form-check-label' for='flexSwitchCheckDefault'>Gestion des Newsletter</label>
                        </div>
                        </div>
                        </div>
            <?php }?>
    </div>
 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="scriptpart.js"></script>
</body>
</html>