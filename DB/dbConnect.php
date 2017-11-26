<?php

$user = "root";
$password = "";
$server = "localhost";
$dbName = "4sail";

$conn = new mysqli($server,$user, $password, $dbName);
$conn->set_charset("utf8");
