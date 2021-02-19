<?php

$servername = "localhost";
$username = "root";
$password = "krishnendu";
$dbname = "recruitment_db2";


$conn = new mysqli($servername, $username, $password, $dbname);


if($conn->connect_error){
	die("Connection Failed!".$conn->connect_error);
}