<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
</head>

<style>
	.divh {
		padding: 0;
		background: #80ccff;
		display: block;
		padding: 5px 5px;
        height: 60px;  
		width: 100%;
		text-decoration: none;
		float: left;
		}
    .divh1 {
        padding: 0;
        background: #80ccff;
        display: block;
        padding: 5px 5px;
        height: 50px;  
        width: 5%;
        text-decoration: none;
        float: left;
    }
    .divh2 {
        padding: 0;
        background: #80ccff;
        display: block;
        padding: 5px 5px;
        height: 50px;  
        width: 40%;
        text-decoration: none;
        float: left;
    }
    .divh3 {
        padding: 0;
        background: #80ccff;
        display: block;
        padding: 5px 5px;
        height: 50px;  
        width: 25%;
        text-decoration: none;
        float: left;
    }
    .divh4 {
        padding: 0;
        background: #80ccff;
        display: block;
        padding: 5px 5px;
        height: 50px;  
        width: 27%;
        text-decoration: none;
        float: left;
    } 
		.divh:hover 
        {
		 color: #cc4400;
		 background: #ff80d5;
		}
		
		
</style>
<body>

  <div class="divh">
    <div class="divh1">
      <img src="\Gatepass\Assets\Klassic_Logo.png" height="45" width="45" alt="Gatepass"/> 
      &nbsp;&nbsp; 
    </div>
    <div class="divh2">
       <span>&nbsp; Company : <?php  if (isset($_SESSION)){ echo $_SESSION['sCompanyName'];} ?> </span> 
       <br>
       <span>&nbsp; Site &nbsp;: <?php  if (isset($_SESSION)){ echo $_SESSION['sSiteName'];} ?></span>
    </div>
    <div class="divh3"><b> Gatepass </b> </div>
    <div class="divh4">
  	   <span>&nbsp;	User Name : <?php  if (isset($_SESSION)){ echo $_SESSION['sUserName'];} ?></span>
    </div>
  </div>

</body>
</html>
