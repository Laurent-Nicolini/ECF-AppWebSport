<?php
session_start();
if(isset($_POST['email']) && isset($_POST['password']))
{
   $email = $_POST['email'];
   $password = $_POST['password'];
    // connexion à la base de données
    try{
        $pdo = new PDO("mysql:host=localhost;dbname=appwebsport","root","");
        $statement = $pdo->prepare("SELECT * FROM users WHERE email =:email AND password =:password");
        $statement->bindValue(':email', $email, PDO::PARAM_STR);
        $statement->bindValue(':password', $password, PDO::PARAM_STR);
    }
     catch(PDOException $e){
        echo $e->getMessage();
     }
    
    // on applique les deux fonctions mysqli_real_escape_string et htmlspecialchars
    // pour éliminer toute attaque de type injection SQL et XSS
    $statement->execute();
    $result = $statement->fetchAll();
    var_dump($result);
     if ($email=$result && $password=$result){
           $_SESSION['email'] = $email;
           header('Location: index.php');
     } else
        {
           header('Location: login.php?erreur=1'); // utilisateur ou mot de passe incorrect
        }
}
else
{
   header('Location: login.php');
}
mysqli_close($db); // fermer la connexion
?>