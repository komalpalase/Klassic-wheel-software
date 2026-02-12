
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
      $hint1 = strtotime(substr($row['DateofJoining'],0,10));
      $hint2 = strtotime(substr(date("Y-m-d"),0,10));

      $diff =ABS($hint1-$hint2);

            // Calculate years
      $years = floor($diff / (365*60*60*24)); 

      // Calculate months
      $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24)); 

      $hint= $years." Years ".$months." Months"." [ Joining Date : ".substr($row['DateofJoining'],8,2).substr($row['DateofJoining'],4,4).substr($row['DateofJoining'],0,4)." ]";

   }

   If ($hint === "")
   {
    $hint = "-";
   }

}
// Output "no suggestion" if no hint was found or output correct values
echo $hint === "" ? "No Suggestion" : $hint;

?>