<?php

session_start();


$_SESSION = array(); //Delete the session data

session_destroy();


header("Location: login.php");
exit();
?>