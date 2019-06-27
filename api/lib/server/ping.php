<?php

function pingServer($ip, $port)
{
    $fp = @fsockopen($ip, $port, $errno, $errstr, 0.1);
    if (!$fp) {
        return false;
    } else {
        fclose($fp);
        return true;
    }

}
