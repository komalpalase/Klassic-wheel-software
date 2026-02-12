<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to Gatepass </title>
		<style type="text/css">
			
				body{
				font-size: 14px;
				font-family: Arial,sans-serif;
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

            .divm2{
            	height: 490px;
            }

	</style>
	
	<script type="text/javascript">
	  document.addEventListener("keydown", function (event){
	      if (event.ctrlKey)
	        {       event.preventDefault();    }
	      if(event.keyCode == 123)
	        {       event.preventDefault();    }});

	  document.addEventListener('contextmenu', 
	     event => event.preventDefault());
	</script>

</head>
<body>
    <?php $this->load->view('header.php');  ?>

			<nav>
				<ul>

                 <?php  If ($_SESSION["sUserType"]=="Admin"  ) { ?>
				    <li><a href="Master" target="_self"> Master </a></li>
				 <?php } ?>

                 <?php  If ($_SESSION["sUserType"]=="Admin" || $_SESSION["sUserType"]=="User" ) { ?>
					<li><a href="Transaction" target="_self"> Transaction </a></li>
				 <?php } ?>

					<li><a href="Rpts"> Reports </a></li>
					

				</ul>
			</nav>

        <div class="divm2">



        </div>

        <?php $this->load->view('footer.php'); ?>

</body>
</html>


