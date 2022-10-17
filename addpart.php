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
        <?php
        if ($_GET["ajout"] == "partenaire"){
            echo '
            <br>
            <h2 class="text-center">Ajouter un Partenaire</h2>
            <br>
            <form method="POST" action="validpart.php" class="container">
            <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Entrez email...">
            <small id="emailHelp" class="form-text text-muted">Ne partagez jamais vos identifiants avec quelqu\'un d\'autre.</small>
            </div>
            <div class="form-group">
            <label for="password">Mot de passe</label>
            <input type="password" name="password" class="form-control" id="password" placeholder="Entrez le mot de passe...">
            </div>
            <div class="form-group">
            <label for="role">Rôle Utilisateur</label>
            <select class="form-control" name="role" id="role" aria-describedby="roleHelp">
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

        if ($_GET["ajout"] == "franchise"){
            echo '
            <br>
            <h2 class="text-center">Ajouter une Franchise</h2>
            <br>
            <form method="POST" action="validpart.php" class="container">
            <div class="form-group">
            <label for="nom">Nom de la Franchise</label>
            <input type="text" name="nom" class="form-control" id="nom" placeholder="Entrez le nom de la franchise...">
            </div>
            <div class="form-group">
            <label for="active">Franchise Active/Inactive</label>
            <select class="form-control" name="active" id="active" aria-describedby="franchiseHelp">
            <option>1</option>
            <option>0</option>
            </select>
            <small id="franchiseHelp" class="form-text text-muted">1-> Active // 0-> Inactive</small>
            </div>
            <br>
            <button type="submit" class="btn" style="color:#34C924;">Créer Franchise</button>
            </form>';
        };

        if ($_GET["ajout"] == "structure"){
            echo '
            <br>
            <h2 class="text-center">Ajouter une Structure</h2>
            <br>
            <form method="POST" action="validpart.php" class="container">
            <div class="form-group">
            <label for="adresse">Adresse de la Structure</label>
            <input type="text" name="adresse" class="form-control" id="adresse" placeholder="Entrez l\'adresse de la structure...">
            </div>
            <div class="form-group">
            <label for="text_court">Quelques mots sur la structure</label>
            <input type="textarea" name="text_court" class="form-control" id="text_court" placeholder="Informations de la structure...">
            </div>
            <br>
            <button type="submit" class="btn" style="color:#34C924;">Créer la Structure</button>
            </form>';
        }

        if ($_GET["ajout"] == "valider"){
            echo '
            <br>
            <div class="container">
            <p class="text-center bg-success">Un franchisé et sa structure ont bien été ajouté</p>
            <p class="text-center">Retour vers <a href="allusers.php?filtre=none">la liste de tous les partenaires</a></p>
            </div>
            ';
        }
        ?>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>