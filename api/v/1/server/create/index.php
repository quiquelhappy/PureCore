<?php

// lib
include_once($_SERVER['DOCUMENT_ROOT']."/api/lib/autoload.php");


// runtime

if(isset($_REQUEST["session"])){
    $id=$_REQUEST["session"];
}

if(isset($_REQUEST["session_hash"])){
    $hash=$_REQUEST["session_hash"];
}

if(isset($_REQUEST["name"])){
    $name=$_REQUEST["name"];
}

if(isset($_REQUEST["ip"])){
    $ip=$_REQUEST["ip"];
}

if(isset($_REQUEST["port"])){
    $port=$_REQUEST["port"];
}

if(isset($id)&&isset($hash)&&isset($name)&&isset($ip)&&isset($port)){ // check request

    if(checkSession($id,$hash)){ // check session

        $owner=getSession($id); // get the owner

        if(canCreateServer($owner)){ // get perms

            $server=createServer($name,$ip,$port,$owner); // creates the servers (or tries it)

            if(is_null($server)){
                print(json_encode(array("error"=>"there was an unknown error while creating the server, please, try again later or check the details")));
            } else {
                print(json_encode(array("uuid"=>$server)));
            }

        } else {
            print(json_encode(array("error"=>"you need to upgrade your plan in order to keep creating servers")));
        }

    } else {
        print(json_encode(array("error"=>"invalid credentials")));
    }
} else {
    print(json_encode(array("error"=>"invalid request")));
}