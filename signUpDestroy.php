<?php
session_start();
session_unset();
session_destroy();

if (!isset($_SESSION['selectedPCs'])) {
    echo "<script>alert('Computers sessions have been ended successfully');</script>";
    echo "<script>window.location.href='Home.php';</script>";
    
}
?>
