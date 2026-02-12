<?php
session_start();
$_SESSION['company'] = $_GET['id'];
echo "Company Selected";
?>
