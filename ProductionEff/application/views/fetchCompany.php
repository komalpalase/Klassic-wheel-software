<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Welcome to Gatepass </title>
    <style type="text/css">

      table, th, td {
        border: 1px solid;
      }

    </style>

  </head>
  <body>


<?php

include("DBController.php");

if(isset($_POST['CompanyId'])){
    $CompanyId= $_POST['CompanyId'];
   
   $fetchData =fetchDataById($CompanyId);

   // return($fetchData);

   displayData($fetchData);
}

function fetchDataById($CompanyId){

    $db_handle = new DBController();
    
    $query ="SELECT CompanyId,CompanyName FROM CompanyMaster WHERE CompanyId='$CompanyId'";

    $result = $db_handle->runQuery($query);

    $numRow=$db_handle->numRows($query);

    if($numRow > 0){
      $results=$result;
    }else{
      $results=[];
    }
    return $results;
}

function displayData($fetchData)
 {
   // echo '<select>';

      foreach($fetchData as $data){ 
         ?>
            <option value="<?php echo $data['CompanyId'];?>">
                 <?php echo $data['CompanyName'];?>
            </option>
        <?php
          }        
 }

        ?>

 </body>
</html>