<?php 

$Host = "localhost";
$Name = "root";
$Password = "";
$Database = "elibrary";

$con = mysqli_connect($Host, $Name, $Password, $Database);
if(!$con)
{
    echo "Connection unsuccessfull";
}

?>