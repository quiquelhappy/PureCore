<?php

function updateOwner($email, $name, $surname)
{
    global $conn;

    $sql = $conn->prepare("SELECT `id` FROM owners WHERE email =:email");
    $sql->bindValue(":email", $email);
    $sql->execute();
    $data = $sql->fetch(PDO::FETCH_OBJ);

    if (empty($data)) {
        // register acc

        $id=openssl_random_pseudo_bytes(16);
        return $id;

    } else {
        // update acc

        $id=$data->id;

        $sql = "UPDATE `owners` SET `email`='$email',`name`='$name',`surname`='$surname' WHERE `id`='$id'";
        $conn->exec($sql);
        return $id;
    }
}
