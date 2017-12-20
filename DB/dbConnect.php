<?php

$user = "adminhoraire";
$password = "H0r4ire!";
$server = "localhost";
$dbName = "Testerino";

$conn = new mysqli($server,$user, $password, $dbName);
$conn->set_charset("utf8");
