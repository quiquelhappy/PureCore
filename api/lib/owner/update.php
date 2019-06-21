<?php

function updateOwner($email, $name, $surname)
{
    global $conn;

    $sql = $conn->prepare("SELECT id FROM `owners` WHERE email = :emailid");
    $sql->bindValue(":emailid", $email);
    $sql->execute();
    $data = $sql->fetch(PDO::FETCH_OBJ);

    if (empty($data)) {
        // register acc

        $id = bin2hex(random_bytes(8));
        $hash = bin2hex(random_bytes(64));

        $name = $name; //to-do detox
        $surname = $surname; //to-do detox
        $email = $email; //to-do detox

        $sql = "INSERT INTO owners (`id`, `hash`, `name`, `surname`, `email`) VALUES ('$id', '$hash', '$name','$surname','$email')";
        $conn->exec($sql);

        return $id;
    } else {
        // update acc

        $id = $data->id;

        $name = $name; //to-do detox
        $surname = $surname; //to-do detox
        $email = $email; //to-do detox

        $sql = "UPDATE `owners` SET `email`='$email',`name`='$name',`surname`='$surname' WHERE `id`='$id'";
        $conn->exec($sql);

        return $id;
    }
}
