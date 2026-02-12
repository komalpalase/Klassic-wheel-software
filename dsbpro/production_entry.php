<?php
include "db.php";

if(isset($_POST['save'])){
$company=$_SESSION['company'];
$dept=$_SESSION['department'];
$operation=$_SESSION['operation'];
$qty=$_POST['qty'];

mysqli_query($conn,"insert into production_transaction(company,department,operation,qty)
values('$company','$dept','$operation','$qty')");
}

?>

<form method="post">
Quantity:
<input type="text" name="qty">
<input type="submit" name="save" value="Save">
</form>
