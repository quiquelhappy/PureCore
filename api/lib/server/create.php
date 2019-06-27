<?php

function createServer($name, $ip, $port, $owner)
{

    global $conn;

    $name = htmlentities($name, ENT_QUOTES);

    if (!is_null(getOwner($owner))) {
        $name_length = strlen($name);
        $ip_length = strlen($ip);
        $port_length = strlen($port);

        $port_length_ok = ($port_length > 0 && $port_length < 6);
        $ip_length_ok = ($ip_length > 3 && $ip_length < 30);
        $name_length_ok = ($name_length > 3 && $name_length <= 32);

        if ($port_length_ok && $ip_length_ok && $name_length_ok) {

            if (pingServer($ip, $port)) {

                $ip_numerical=gethostbyname($ip);

                $sql = $conn->prepare("SELECT ip FROM `servers` WHERE ip =:ip AND owner = :owner");
                $sql->bindValue(":ip", $ip);
                $sql->bindValue(":owner", $owner);
                $sql->execute();
                $data = $sql->fetch(PDO::FETCH_OBJ);

                if (empty($data)) {

                    $id = bin2hex(random_bytes(8));

                    $port = intval($port);

                    $sql = "INSERT INTO servers (`id`, `name`, `ip`, `ip_numerical`, `port`, `owner`) VALUES ('$id', '$name', '$ip', '$ip_numerical', '$port','$owner')";
                    $conn->exec($sql);

                    return $id; // all ok

                } else {

                    return null; // the owner already has a server with the same name in that account (with that email)

                }
            } else {

                return null; // couldn't ping the server

            }
        } else {

            return null; // couldn't check the lenghts

        }
    } else {

        return null; // couldn'0t check the owner

    }
}
