<?php

// third-party
include_once($_SERVER['DOCUMENT_ROOT']."/vendor/autoload.php");

// conn
include_once 'database/connection.php';

// owner
include_once 'owner/update.php';
include_once 'owner/get.php';

// sessions
include_once 'session/new.php';
include_once 'session/check.php';

// servers
include_once 'server/ping.php';