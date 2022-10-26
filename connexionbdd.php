<?php
   try{
      //$pdo = new PDO("mysql:host=localhost;dbname=odrl9643_appwebsport","odrl9643_awsadmin","App2022+");
      $pdo = new PDO("mysql:host=localhost;dbname=appwebsport","root","");
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   }
   catch(PDOException $e){
      exit('<b>Catched exception at line '. $e->getLine() .' :</b> '. $e->getMessage());
   }
?>