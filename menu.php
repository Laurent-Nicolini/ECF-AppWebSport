<nav class="navbar navbar-expand-lg sticky-top navbar-light bg-light">
        <div class="container-fluid">
            <div class="d-flex flex-column" >
                <a class="navbar-brand" href="index.php">Admin App Web Sport</a>
                <p class=""><a href='deconnexion.php'>Déconnexion</a></p>
            </div>
            <?php
            if($_SESSION['role'] == 1){
                echo '
            <div class="container-fluid d-flex">
                <ul class="navbar-nav align-items-center">
                    <li class="nav-item active">
                        <a class="nav-link" href="allusers.php?filtre=none">Voir tous les partenaires</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="addpart.php?ajout=partenaire">Ajouter un partenaire</a>
                    </li>            
                </ul>
                <form class="form-inline my-2 my-lg-2 ms-auto" action="search.php" method="POST">
                    <input class="form-control mr-sm-2" name="search" type="search" placeholder="Entrez votre recherche..." aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-2 recherche" type="submit">Recherchez</button>
                </form>
            </div>';} ?>
        </div>
    </nav>