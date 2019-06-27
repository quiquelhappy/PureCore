<?php

function getSession($sessionid){
    global $conn;

    $sql = $conn->prepare("SELECT owner FROM `sessions` WHERE id =:id");
    $sql->bindValue(":id", $sessionid);
    $sql->execute();
    $data = $sql->fetch(PDO::FETCH_OBJ);

    if(empty($data)){
        return null;
    } else {
        return $data->owner;
    }

}