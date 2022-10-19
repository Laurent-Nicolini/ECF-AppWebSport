
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
    <main>
        <br>
        <p class="text-center">Bienvenue, entrez vos identifiants afin d'accéder au panneau d'administration de l'App Web Sport.</p>
        <br>
        <div class="row">
            <div class="col-sm-0 col-lg-3"></div>
            <form class="col-sm-10 col-lg-6 mx-5" name="form" method="POST" action="connexion.php">
                <div class="form-group">
                    <label for="exampleInputEmail1">Adresse Email</label>
                    <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Entrez votre email..." pattern="[A-Za-z0-9](([_\.\-]?[a-zA-Z0-9]+)*)@([A-Za-z0-9]+)(([_\.\-]?[a-zA-Z0-9]+)*)\.([A-Za-z]{2,})" require>
                    <small id="emailHelp" class="form-text text-muted">Ne partagez jamais vos identifiants avec quelqu'un d'autre.</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Mot de Passe</label>
                    <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Entrez votre mot de passe..." require>
                </div>
                <button id="submit" type="submit" class="btn mt-3" value="LOGIN">Valider</button>
                <?php
                if(isset($_GET['erreur'])){
                    $err = $_GET['erreur'];
                    if($err !==0)
                        echo "<p class='bg-danger mt-3 text-white text-center'>Utilisateur ou mot de passe incorrect</p>";
                }
                ?>
            </form>
            <div class="col-sm-0 col-lg-3"></div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>