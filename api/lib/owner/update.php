<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function updateOwner($email, $name, $surname)
{
    global $conn;

    $sql = $conn->prepare("SELECT id FROM `owners` WHERE 'email' =:email");
    $sql->bindValue(":email", $email);
    $sql->execute();
    $data = $sql->fetch(PDO::FETCH_OBJ);

    if (empty($data)) {
        // register acc

        $hash=$hash = bin2hex(random_bytes(32));
        $id=$hash = bin2hex(random_bytes(8));
        
        return $id;

    } else {
        // update acc

        $id=$data->id;

        $sql = "UPDATE `owners` SET `email`='$email',`name`='$name',`surname`='$surname' WHERE `id`='$id'";
        $conn->exec($sql);
        return $id;
    }
}
