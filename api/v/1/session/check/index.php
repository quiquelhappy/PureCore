<?php

// lib
include_once($_SERVER['DOCUMENT_ROOT']."/api/lib/autoload.php");

if(isset($_REQUEST["session"])){
    $session=$_REQUEST["sesssion"];
}

if(isset($_REQUEST["session_hash"])){
    $hash=$_REQUEST["session_hash"];
}

if(isset($session)&&isset($hash)){
    if(checkSession($session,$hash)){
        print(json_encode(array("success"=>true)));
    } else {
        print(json_encode(array("error"=>"invalid credentials")));
    }
} else {
    print(json_encode(array("error"=>"invalid request")));
}