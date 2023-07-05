<?php
session_start();
session_unset();
session_destroy();
if(!isset($_SESSION['selectedPCs']))
{
header("location: logIn.php");
exit();
}

?>