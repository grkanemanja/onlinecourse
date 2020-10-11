<?php

error_reporting( E_ALL & ~E_NOTICE ^ E_DEPRECATED);
?>

<?php
$host = "localhost";
$server_username = "root";
$database_name = "Project";
$database_password = "";
$conn = mysqli_connect($host, $server_username, $database_password, $database_name);

if(!$conn){
    die("An Error Occured!");

} else {
  // echo "Connection established";  // Cooment this out to see if the connection work.s
}

?>