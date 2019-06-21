<?php

use Jenssegers\Agent\Agent;

$agent = new Agent();

use Victorybiz\GeoIPLocation\GeoIPLocation;

$geoip = new GeoIPLocation();

function newSession($ownerid)
{
    global $agent, $conn, $geoip;

    $device = $agent->device();

    $platformname = $agent->platform();
    $platformversion = $agent->version($platformname);
    $platform = $platformname . " " . $platformversion;

    $browsername = $agent->browser();
    $browserversion = $agent->version($browsername);
    $browser = $browsername . " " . $browserversion;

    $languages = serialize($agent->languages());

    $city = $geoip->getCity();
    $region = $geoip->getRegion();
    $country = $geoip->getCountryCode();

    $location = serialize(array("c" => $city, "r" => $region, "C" => $country));
    
    $ip = md5($geoip->getIP());

    if (getOwner($ownerid) != null) {

        $id=bin2hex(random_bytes(8));
        $hash = bin2hex(random_bytes(64));
        
        $sql = "INSERT INTO sessions (`id`, `owner`, `device`, `platform`, `browser`,`languages`,`location`,`hash`,`ip`) VALUES ('$id', '$ownerid', '$device','$platform','$browser','$languages','$location','$hash','$ip')";
        $conn->exec($sql);

        return array("id"=>$id,"hash"=>$hash);

    } else {
        // unknown user
        return null;
    }
}
