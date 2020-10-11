<?php

require('../connection.php');

$GetAdminCredentials = "SELECT user_id , user_type, user_name, user_email FROM users WHERE user_email = '".$_SESSION['UserEmail']. "' ";
$result = mysqli_query($conn, $GetAdminCredentials);
$row = mysqli_fetch_array($result);
$GLOBALS['GLOBAL_USER_ID'] = $row['user_id'];
$GLOBALS['GLOBAL_USER_TYPE'] = $row['user_type'];
$GLOBALS['GLOBAL_USER_NAME'] = $row['user_name'];
$GLOBALS['GLOBAL_USER_EMAIL'] = $row['user_email'];


?>