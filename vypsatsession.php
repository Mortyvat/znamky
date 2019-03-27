<?php
session_start();
$username = "";
$_SESSION['login_user'] = $username;
if(isset($_SESSION['login_user'])){
$username = $_SESSION['login_user'];
echo $username;

}

?>

