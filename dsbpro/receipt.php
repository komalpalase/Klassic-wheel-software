<?php
session_start();

$company = $_SESSION['company'];
$department = $_SESSION['department'];
$operation = $_SESSION['operation'];

echo "<h3>Production Receipt</h3>";

echo "Company : ".$company."<br>";
echo "Department : ".$department."<br>";
echo "Operation : ".$operation."<br>";
?>
