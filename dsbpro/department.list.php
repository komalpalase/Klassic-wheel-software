<?php
include "db.php";

$res = mysqli_query($conn,"select dept_id,dept_name from department_master");

echo "<h3>Department List</h3>";
echo "<table border=1>";
echo "<tr><th>ID</th><th>Name</th><th>Select</th></tr>";

while($row=mysqli_fetch_assoc($res)){
echo "<tr>
<td>{$row['dept_id']}</td>
<td>{$row['dept_name']}</td>
<td><a href='select.php?type=department&id={$row['dept_id']}'>Select</a></td>
</tr>";
}
echo "</table>";
?>
