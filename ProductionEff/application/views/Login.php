<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Welcome to Production System</title>


    <link rel="stylesheet" href="\\localhost\`\Assets\css\bootstrap.min.css">

  	<script src="\\localhost\ProductionEff\Assets\js\jquery.min.js"></script>
  	<script src="\\localhost\ProductionEff\Assets\js\bootstrap.min.js"></script>

    <link rel="stylesheet" type="text/css" href="\\localhost\ProductionEff\Assets\css\bootstrap.css">
    <link rel="stylesheet" type="text/css" href="\\localhost\ProductionEff\Assets\css\bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="\\localhost\ProductionEff\Assets\css\bootstrap-grid.css">
    <link rel="stylesheet" type="text/css" href="\\localhost\ProductionEff\Assets\css\bootstrap-grid.min.css">
    <link rel="stylesheet" type="text/css" href="\\localhost\ProductionEff\Assets\css\bootstrap-reboot.css">
    <link rel="stylesheet" type="text/css" href="\\localhost\ProductionEff\Assets\css\bootstrap-reboot.min.css">
    <script type="text/javascript" src="\\localhost\ProductionEff\Assets\js\bootstrap.bundle"></script>
    <script type="text/javascript" src="\\localhost\ProductionEff\Assets\js\bootstrap.bundle.min"></script>
    <script type="text/javascript" src="\\localhost\ProductionEff\Assets\js\bootstrap"></script>
    <script type="text/javascript" src="\\localhost\ProductionEff\Assets\js\bootstrap.min"></script>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <style type="text/css">
body {
       background-color: lightblue;
     }

h1 {
color: navy;
margin-left: 20px;
}
    img {
          float: left;
          width: 100%;
          height: 100%;
    }

    div {
          float: left;
          width:50%;
          height:700px;
          padding: 0px;
          background: violet;
          box-sizing: border-box;
      }

     .first{
          background-color: grey;
         }

     .second{
          background-color: skyblue;
          }

          fieldset {
            display: block;
            margin-left: 80px;
            margin-right: 2px;
            padding-top: 0.35em;
            padding-bottom: 0.625em;
            padding-left: 0.75em;
            padding-right: 0.75em;
            border: 2px groove (internal value);
          }      

    </style>



</head>
<body>

        <div class ="first" id="demo" class="carousel slide" data-ride="carousel" data-interval="2000">
          <!-- The slideshow -->
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="\\localhost\ProductionEff\Assets\Gatepass_img\klassic.png" alt="Klassic">
            </div>

            </div>
          </div>
        </div>

        <div class="second">

             <form action="/ProductionEff/LoginUser" method="post" target="_self">
             <fieldset>
                  <br>
                  <br>
                  <legend><h6>Sign in : </h6></legend>
                  <br>
                  <br>
                  <span> <h3>  Gatepass Software </h3> </span>
                  <br>
                  <br>


                  <label for="fname">User Name :</label>
                  <input type="text" id="fname" name="UserName" placeholder="UserName" required maxlength="100">  
                  <br><br>
                  <label for="lname">Password :&nbsp;&nbsp;&nbsp;</label>
                  <input type="Password" id="lname" name="Password" placeholder="Password" required maxlength="20">
                  <br><br>
                  <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                  <input type="submit" value="Login">
               </fieldset>
            </form>



        </div>

</body>
</html>
