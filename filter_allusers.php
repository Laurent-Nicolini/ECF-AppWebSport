<?php
    include_once 'connexionbdd.php';

    $statement = $pdo->prepare(
        "SELECT * FROM users 
        INNER JOIN franchise ON users.id=users_id 
        INNER JOIN structure ON franchise.id=franchise_id
        WHERE role = 0"
        );

    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_OBJ);