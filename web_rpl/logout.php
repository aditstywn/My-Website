<?php
session_start();

$_SESSION = [];
session_unset();
session_destroy();


//kebali ke login
header("Location:login.php");
exit;

?>