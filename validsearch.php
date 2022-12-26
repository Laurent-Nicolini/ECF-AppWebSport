<?php
include_once 'connexionbdd.php';

$statement = $pdo->prepare(
    "SELECT * FROM users 
INNER JOIN franchise ON users.id=users_id 
INNER JOIN structure ON franchise.id=franchise_id
WHERE Nom LIKE :search OR text_court LIKE :search OR Email LIKE :search OR Adresse LIKE :search OR users.Id LIKE :search"
);
$statement->bindValue(":search", "%$search%", PDO::PARAM_STR);
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_OBJ);