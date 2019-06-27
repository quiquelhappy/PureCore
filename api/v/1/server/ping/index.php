<?php
use function GuzzleHttp\json_encode;

// lib
include_once($_SERVER['DOCUMENT_ROOT']."/api/lib/autoload.php");

// props
header ('Content-type: text/html; charset=utf-8');

// runtime

if(isset($_REQUEST["ip"])){
    $ip=$_REQUEST["ip"];
}

if(isset($_REQUEST["port"])){
    $port=$_REQUEST["port"];
} else {
    $port=25565;
}

if(isset($ip)){
    $result=pingServer($ip,$port);

    if($result){
        print(json_encode(array("success"=>true)));
    } else {
        print(json_encode(array("error"=>"couldn't ping the server with the port ".strval($port))));
    }
} else {
    print(json_encode(array("error"=>"invalid ip or empty request")));
}