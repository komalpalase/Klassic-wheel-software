<?php
include "db.php";

$res=mysqli_query($conn,"select * from production_transaction order by id desc limit 1");
$row=mysqli_fetch_assoc($res);

echo "<h3>Production Receipt</h3>";
echo "Company : ".$row['company']."<br>";
echo "Department : ".$row['department']."<br>";
echo "Operation : ".$row['operation']."<br>";
echo "Qty : ".$row['qty']."<br>";
?>
