<?php
include "db.php";

$res = mysqli_query($conn,"select company_id,company_name from company_master");

echo "<h3>Company List</h3>";
echo "<table border=1>";
echo "<tr><th>ID</th><th>Name</th><th>Select</th></tr>";

while($row=mysqli_fetch_assoc($res)){
echo "<tr>
<td>{$row['company_id']}</td>
<td>{$row['company_name']}</td>
<td><a href='select.php?type=company&id={$row['company_id']}'>Select</a></td>
</tr>";
}
echo "</table>";
?>
