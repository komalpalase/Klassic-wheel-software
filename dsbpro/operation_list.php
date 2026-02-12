<?php
include "db.php";

$res = mysqli_query($conn,"select op_id,op_name from operation_master");

echo "<h3>Operation List</h3>";
echo "<table border=1>";
echo "<tr><th>ID</th><th>Name</th><th>Select</th></tr>";

while($row=mysqli_fetch_assoc($res)){
echo "<tr>
<td>{$row['op_id']}</td>
<td>{$row['op_name']}</td>
<td><a href='select.php?type=operation&id={$row['op_id']}'>Select</a></td>
</tr>";
}
echo "</table>";
?>
