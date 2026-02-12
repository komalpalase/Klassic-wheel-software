
<?php

// get the q parameter from URL
$q = $_REQUEST["q"];

$hint = "";

// lookup all hints from array if $q is different from ""
if ($q !== "") {
  $q = strtolower($q);
  $len=strlen($q);

  $sql = "SELECT * FROM employee where EmployeeCode ='$q'";

  $host='localhost';
  $db='training';
  $user='root';
  $passwd='root';  //npd#$123
  $port=3307;
  $gconn = new PDO("mysql:host={$host};port={$port};dbname={$db}", $user, $passwd);

  foreach ($gconn->query($sql) as $row) 
   {
      $hint = $row['Designation'];
   }

}
// Output "no suggestion" if no hint was found or output correct values
echo $hint === "" ? "No Suggestion" : $hint;

?>