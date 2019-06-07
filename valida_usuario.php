<?php

require_once('classes/Connection.php');
$obj = new Connection();
$connection = $obj->connection_db();
$login = $obj->login();