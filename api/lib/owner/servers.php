<?php

function getOwnerServers($ownerid)
{

    global $conn;

    if (is_null(getOwner($ownerid))) {
        return null;
    } else {

        $sql = $conn->prepare("SELECT id FROM `servers` WHERE owner =:id");
        $sql->bindValue(":id", $ownerid);
        $sql->execute();
        $data = $sql->fetchAll(PDO::FETCH_OBJ);

        if (empty($data)) {
            return array();
        } else {

            $servers = array();
            foreach ($data as $key => $value) {
                array_push($servers, $value->id);
            }

            return $servers;
        }
    }
    
}
