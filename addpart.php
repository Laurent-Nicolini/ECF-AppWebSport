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
        <br>
        <h2 class="text-center">Ajouter un partenaire</h2>
        <br>
        <?php
        if ($_GET == "partenaire"){
            echo '
            <form method="POST" action="validpart.php" class="container">
            <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Entrez email...">
            <small id="emailHelp" class="form-text text-muted">Ne partagez jamais vos identifiants avec quelqu\'un d\'autre.</small>
            </div>
            <div class="form-group">
            <label for="password">Mot de passe</label>
            <input type="password" class="form-control" id="password" placeholder="Entrez le mot de passe...">
            </div>
            <div class="form-group">
            <label for="role">Rôle Utilisateur</label>
            <select class="form-control" id="role" aria-describedby="roleHelp">
            <option>0</option>
            <option>1</option>
            </select>
            <small id="roleHelp" class="form-text text-muted">0-> Partenaire</small><br>
            <small id="roleHelp1" class="form-text text-muted">1-> Administrateur</small>
            </div>
            <br>
            <button type="submit" class="btn" style="color:#34C924;">Créer Partenaire</button>
            </form>';
        };
        ?>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>