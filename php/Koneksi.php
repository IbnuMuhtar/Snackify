<?php
$sarvername = "localhost";
$username = "root";
$password = "";
$dbname = "snackify";

$conn = new mysqli($sarvername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: ".$conn->connect_error);
}
?>