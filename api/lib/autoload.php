<?php

// third-party
include_once($_SERVER['DOCUMENT_ROOT']."/vendor/autoload.php");

// conn
include_once 'database/connection.php';

// owner
include_once 'owner/update.php';
include_once 'owner/get.php';

// sessions
include_once 'session/check.php';
include_once 'session/get.php';
include_once 'session/new.php';

// pricing
include_once 'pricing/perms.php';

// servers
include_once 'server/create.php';
include_once 'server/ping.php';