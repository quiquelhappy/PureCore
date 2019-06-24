<?php

// lib
include_once($_SERVER['DOCUMENT_ROOT']."/api/lib/autoload.php");

if(isset($_REQUEST["session"])){
    $id=$_REQUEST["session"];
}

if(isset($_REQUEST["session_hash"])){
    $hash=$_REQUEST["session_hash"];
}

if(isset($id)&&isset($hash)){
    if(checkSession($id,$hash)){
        print(json_encode(array("success"=>true)));
    } else {
        print(json_encode(array("error"=>"invalid credentials")));
    }
} else {
    print(json_encode(array("error"=>"invalid request")));
}