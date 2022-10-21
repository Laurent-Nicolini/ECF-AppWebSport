<?php
session_start();
if (isset($_GET['idstructure']) && isset($_GET['users_id'])){
$idstructure = $_GET['idstructure'];
$partenaire = $_GET['users_id'];
}
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

    <?php if(isset($_GET['permvalid'])){
        if($_GET['permvalid'] == 'oui'){
            echo "<p class='text-center bg-success text-white'>Les permissions de cette structure ont bien été mises à jour !</p>";
        } else {
            echo "<p class='text-center bg-danger text-white'>Une erreur est survenue ! Les permissions de cette structure n'ont pas été mises à jour !</p>";
        }
    }?>

    <?php
        include_once 'connexionbdd.php';
        $statement = $pdo->prepare(
            "SELECT * FROM franchise
            INNER JOIN structure ON franchise.id=franchise_id
            WHERE users_id = :partenaire AND structure.Id = :idstructure"
        );
        $statement->bindValue(':partenaire', $partenaire, PDO::PARAM_INT);
        $statement->bindValue(':idstructure', $idstructure, PDO::PARAM_INT);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_OBJ);

    ?>
    
    <?php
        foreach($result as $results){ ?>
            <br>
            <h2 class="text-center">Structure de la Franchise: <?=$results->Nom?></h2>
            <br>
            <p class='text-center'>Retournez vers <a href='partenaire.php?users_id=<?=$partenaire?>'>le Partenaire</a></p>
            <br>
            <div class="container d-flex flex-wrap justify-content-around">
                        
                        <div class='card mx-3 my-3' style='width: 18rem;'>
                        <img class='card-img-top' src='haltere.jpg' alt='Card image cap'>
                        <p class='card-text text-white text-center' <?php if ($results->active == 1){ echo "style='background-color: #34C924;'>ACTIF";} else { echo "style='background-color: #DB3A00;'>INACTIF";}?></p>
                        <div class='card-body'>
                        <h5 class='card-title'>Nom: <?= $results->Nom ?></h5>
                        <p class='card-text'><?= $results->text_court ?></p>
                        <p class='card-text'>Adresse: <?= $results->adresse ?></p>
                        <h5>Permissions du Partenaire</h5>
                        <form action='validperm.php?idstructure=<?=$idstructure?>&users_id=<?=$partenaire?>' name="form_perm" method="POST" >
                        <div class='form-check form-switch'>
                        <input class='form-check-input switchperm1' name='boissons' type='checkbox' id='switchperm1' value='1' <?php if($results->perm_boissons == 1){ echo " checked "; } else {echo " ";}?><?php if ($_SESSION['role'] == 0){ echo" disabled";}?>>
                        <label class='form-check-label' for='flexSwitchCheckDefault'>Vendre des boissons</label>
                        </div>
                        <div class='form-check form-switch'>
                        <input class='form-check-input switchperm2' name='planning' type='checkbox' id='switchperm2'value='1' <?php if($results->perm_planning == 1){ echo " checked "; } else {echo " ";}?><?php if ($_SESSION['role'] == 0){ echo" disabled";}?>>
                        <label class='form-check-label' for='flexSwitchCheckDefault'>Gérer les plannings d'équipe</label>
                        </div>
                        <div class='form-check form-switch'>
                        <input class='form-check-input switchperm3' name='newsletter' type='checkbox' id='switchperm3'value='1' <?php if($results->perm_newsletter == 1){ echo " checked "; } else {echo " ";}?><?php if ($_SESSION['role'] == 0){ echo" disabled";}?>>
                        <label class='form-check-label' for='flexSwitchCheckDefault'>Gestion des Newsletter</label>
                        </div>
                        <br>
                        <?php if ($_SESSION['role'] == 1){ echo" 
                        <button class='btn submitperm' type='submit'>Valider Permissions</button>";}?>
                        </form>
                        </div>
                        </div>
            <?php }?>
    </div>
 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="script.js"></script>
</body>
</html>