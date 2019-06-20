<?php

require_once '../../../../../vendor/autoload.php';

if(isset($_REQUEST["id_token"])){
    $id_token=$_REQUEST["id_token"];
}

$CLIENT_ID="593217935798-1h8jef218evbleu7i5su8ctds6urp12f.apps.googleusercontent.com";

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