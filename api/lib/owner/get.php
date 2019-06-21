<?php

function getOwner($id){
    global $conn;

    $sql = $conn->prepare("SELECT id,name,surname,email FROM `owners` WHERE 'id' =:id");
    $sql->bindValue(":id", $id);
    $sql->execute();
    $data = $sql->fetch(PDO::FETCH_OBJ);

    if(empty($data)){
        return null;
    } else {
        return array("email"=>$data->email,"name"=>$data->name,"surname"=>$data->surname,"id"=>$data->id);
    }
}

?>