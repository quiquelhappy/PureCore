<?php

// lib
include_once($_SERVER['DOCUMENT_ROOT']."/api/lib/autoload.php");

// props
header ('Content-type: text/html; charset=utf-8');

// runtime

if(isset($_REQUEST["id_token"])){
    $id_token=$_REQUEST["id_token"];
}

$CLIENT_ID="593217935798-1h8jef218evbleu7i5su8ctds6urp12f.apps.googleusercontent.com";

if(isset($id_token)){

    $client = new Google_Client(['client_id' => $CLIENT_ID]);
    $payload = $client->verifyIdToken($id_token);
    if ($payload) {

      $email=$payload["email"];
      $given_name=$payload["given_name"];
      $family_name=$payload["family_name"];

      $id=updateOwner($email,$given_name,$family_name);

      print(json_encode(array("id"=>$id,"email"=>$email,"given_name"=>$given_name,"family_name"=>$family_name,"session"=>newSession($id))));

    } else {
      print(json_encode(array("error"=>"invalid token")));
    }

} else {
    print(json_encode(array("error"=>"invalid request")));
}
