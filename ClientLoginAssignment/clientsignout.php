<?php
session_start();
//erase all session variables
$_SESSION = array();
//destroy the session
session_destroy();

echo "You have been successfully logged out!";
echo "<a href = 'http://localhost/vfdform/vfd-fixed-deposit-kingrocfella/ClientLoginAssignment/clientlogin.html'>Click Here</a> to log in! ";






?>