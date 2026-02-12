<?php
include "db.php";

$type=$_GET['type'];
$id=$_GET['id'];

$_SESSION[$type]=$id;

echo "Selected ".$type." : ".$id;
?>
