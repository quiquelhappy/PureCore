<?php

function checkSession($sessionid,$sessionhash){

    global $conn;

    $sql = $conn->prepare("SELECT id,hash FROM `sessions` WHERE id =:id");
    $sql->bindValue(":id", $sessionid);
    $sql->execute();
    $data = $sql->fetch(PDO::FETCH_OBJ);

    if(empty($data)){
        return false;
    } else {
        if($data->hash==$sessionhash){
            return true;
        } else {
            return false;
        }
    }
    
}