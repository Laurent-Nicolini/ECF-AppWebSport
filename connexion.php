<?php
session_start();
if(isset($_POST['email']) && isset($_POST['password']))
{
   $email = htmlspecialchars($_POST['email'],ENT_QUOTES);
   $password = htmlspecialchars($_POST['password'], ENT_QUOTES);
    // connexion à la base de données
    try{
      //$pdo = new PDO("mysql:host=localhost;dbname=odrl9643_appwebsport","odrl9643_awsadmin","App2022+");
      $pdo = new PDO("mysql:host=localhost;dbname=appwebsport","root","");
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
         $role = $results->Role;
         $idusers = intval($results->Id);
         $_SESSION['email'] = $results->Email;
      }
   } else {header('Location: login.php?erreur=1');}
   try{
      $stt = $pdo->prepare("SELECT active FROM franchise WHERE users_id =:idusers");
      $stt->bindValue(':idusers', $idusers, PDO::PARAM_INT);
  }
   catch(PDOException $e){
      echo $e->getMessage();
   }
   $stt->execute();
   $result2 = $stt->fetchAll(PDO::FETCH_OBJ);
   foreach ($result2 as $results2){
      if($results2->active){
      $active = $results2->active;
      }
   }

   if (password_verify($password, $passhash)){
      
         if($role == 1){
           $_SESSION['role'] = 1;
           header('Location: index.php'); 
         } elseif ($role == 0) {
            if ($active == 1){
            $_SESSION['role'] = 0;
            $_SESSION['users_id'] = $idusers;

            header("Location: partenaire.php");
            exit();
            } else {
               
               header("Location: login.php?erreur=2");
               exit();
            }
         } else
            {
               header('Location: login.php?erreur=1'); // utilisateur ou mot de passe incorrect
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