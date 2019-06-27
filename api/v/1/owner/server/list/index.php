<?php

// lib
include_once($_SERVER['DOCUMENT_ROOT'] . "/api/lib/autoload.php");

// props
header('Content-type: text/html; charset=utf-8');

// runtime
if (isset($_REQUEST["session"])) {
    $id = $_REQUEST["session"];
}

if (isset($_REQUEST["session_hash"])) {
    $hash = $_REQUEST["session_hash"];
}

if (isset($id) && isset($hash)) {
    if (checkSession($id, $hash)) {

        $owner = getSession($id);
        $servers = getOwnerServers($owner);

        print(json_encode(array("servers"=>$servers)));

    } else {
        print(json_encode(array("error" => "invalid credentials")));
    }
} else {
    print(json_encode(array("error" => "invalid request")));
}
