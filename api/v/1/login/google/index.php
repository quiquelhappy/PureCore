<?php

require_once 'vendor/autoload.php';

if(isset($_POST["id_token"])){
    $id_token=$_POST["id_token"];
}

if(isset($id_token)){

    $client = new Google_Client(['client_id' => $CLIENT_ID]);
    $payload = $client->verifyIdToken($id_token);
    if ($payload) {
      // $userid = $payload['sub'];
      print(json_encode($payload));
    } else {
      print(json_encode(array("error"=>"invalid token")));
    }

} else {
    print(json_encode(array("error"=>"invalid request")));
}

?>