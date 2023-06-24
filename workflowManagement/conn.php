<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "workflow";

$conn = mysqli_connect($server, $username, $password, $database);
if(!$conn)
{
    die("Error in connecting to mySQL: ".mysqli_connect_error());
}
?>