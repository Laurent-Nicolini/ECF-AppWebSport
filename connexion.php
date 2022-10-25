<?php
session_start();
if(isset($_POST['email']) && isset($_POST['password']))
{
   $email = htmlspecialchars($_POST['email']);
   $password = htmlspecialchars($_POST['password']);
    // connexion à la base de données
    try{
      $pdo = new PDO("mysql:host=localhost;dbname=odrl9643_appwebsport","odrl9643_awsadmin","App2022+");
      $statement = $pdo->prepare("SELECT * FROM users WHERE email =:email ");
      $statement->bindValue(':email', $email, PDO::PARAM_STR);
  }
   catch(PDOException $e){
      echo $e->getMessage();
   }
   $statement->execute();
   $result = $statement->fetchAll(PDO::FETCH_OBJ);
   if ($result){
      foreach ($result as $results){
         $passhash = $results->Password;
      }
   } else {header('Location: login.php?erreur=1');}

   if (password_verify($password, $passhash)){
      foreach($result as $results2){
      
         if($results2->Role == 1){
           $_SESSION['role'] = 1;
           header('Location: index.php'); 
         } elseif ($results2->Role == 0) {
            $_SESSION['role'] = 0;
            $_SESSION['usersid'] = intval($results2->Id);
            $usersid = intval($results2->Id);
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