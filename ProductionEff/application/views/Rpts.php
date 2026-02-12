<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

?>
<!DOCTYPE html>
<html lang="en">
  <head>
	  <meta charset="utf-8">
	  <title> Gatepass </title>
		<style type="text/css">
			
				body{
			/*	font-size: 12px;  
				font-family: Arial,sans-serif;*/
				}
				ul {
				padding: 0;
				list-style: none;
				background: #f2f2f2;
				}
				ul li {
				display: inline-block;
				}
				ul li a {
				display: block;
				padding: 10px 25px;
				color: #333;
				text-decoration: none;
				}
				ul li a:hover {
				color: #fff;
				background: #939393;
				}
        .divm1{
              	height: 30px;
              	width: 95%;
                float: left;

               }
        .divm2{
                height: 30px;
                width: 5%;
                float:left;

               } 
        .divnew{
                height: 530px;
                width: 100%;
                float:left;

               }

/* Anchor tag */

        a:link, a:visited {
          color: red;
          text-decoration: underline;
           }


		</style>
    <script type="text/javascript">
      document.addEventListener("keydown", function (event){
          if (event.ctrlKey)
            {       event.preventDefault();    }
          if(event.keyCode == 123)
            {       event.preventDefault();    }});

      document.addEventListener('contextmenu', 
         event => event.preventDefault()
        );
    </script>
  </head>

  <body>

  <?php $this->load->view('header.php');  ?>

   <div class="divm1"><center><h2> Reports </h2></center> </div>
   <div class="divm2"><a href="MainMenu"><img border="0" alt="Back" src="\Gatepass\Assets\Icon\Back.jpg" width="25" height="25" title="Back"></a></div>
   <br>
   <div class="divnew">
      <br><br><br>
      &nbsp;&nbsp;&nbsp;<a href="Rpts001" target="_self"> Gatepass Summary </a> <br><br>

   </div>
   <?php $this->load->view('footer.php'); ?>

  </body>
</html>
