<?php
session_start();
if(isset($_POST['email']) && isset($_POST['password']))
{
   $email = htmlspecialchars($_POST['email']);
   $password = htmlspecialchars($_POST['password']);
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
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_OBJ);
    if($email=$result && $password=$result){
    foreach($result as $results){
      
         if($results->Role == 1){
           $_SESSION['role'] = 1;
           header('Location: index.php'); 
         } elseif ($results->Role == 0) {
            $_SESSION['role'] = 0;
            $_SESSION['usersid'] = intval($results->Id);
            $usersid = intval($results->Id);
            header("Location: partenaire.php?users_id=$usersid");
         } else
            {
               header('Location: login.php?erreur=1'); // utilisateur ou mot de passe incorrect
            }
         }
      } else {
         header('Location: login.php?erreur=1');
         exit();
      }
} else {
   header('Location: login.php?erreur=1');
   exit();
}
?>