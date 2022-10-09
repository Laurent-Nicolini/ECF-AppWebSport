<?php
   try{
      $pdo=new PDO("mysql:host=localhost;dbname=users","root","");
   }
   catch(PDOException $e){
      echo $e->getMessage();
   }
?>