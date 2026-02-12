<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to Gatepass </title>
		<style type="text/css">
			
html, body {
    height: 100%;
    margin: 0;
    font-family: Arial, sans-serif;
}

body {
    display: flex;
    flex-direction: column;
}

.content {
    flex: 1; /* This makes content take remaining space */
}

footer {
    background: #f2f2f2;
    padding: 10px 0;
    text-align: center;
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

	
     <div class="content">
	<nav class="navbar navbar-expand-lg bg-white border-bottom shadow-sm">
    <div class="container-fluid">

        <span class="navbar-brand font-weight-bold text-dark">
            Menu
        </span>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainMenu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="mainMenu">
            <ul class="navbar-nav mr-auto">

                <?php if(isset($_SESSION["sUserType"]) && strtolower($_SESSION["sUserType"])=='admin') { ?>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="<?= base_url('Master') ?>">
                        Master
                    </a>
                </li>
                <?php } ?>

                <?php if(isset($_SESSION["sUserType"]) && 
                    (strtolower($_SESSION["sUserType"])=='admin' || strtolower($_SESSION["sUserType"])=='user')) { ?>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="<?= base_url('Transaction') ?>">
                        Transaction
                    </a>
                </li>
                <?php } ?>

                <li class="nav-item">
                    <a class="nav-link text-dark" href="<?= base_url('Rpts') ?>">
                        Reports
                    </a>
                </li>

            </ul>
        </div>
    </div>
</nav>

       <div class="container-fluid mt-3">
        </div>
    </div>
        <?php $this->load->view('footer.php'); ?>

</body>
</html>


