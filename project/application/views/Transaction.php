<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Transaction</title>

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>
*{
  margin:0;
  padding:0;
  box-sizing:border-box;
}

body{
  background:#f5f6fa;
  font-family: Arial, Helvetica, sans-serif;

  /* footer bottom trick */
  min-height:100vh;
  display:flex;
  flex-direction:column;
}

/* page content wrapper */
.page-content{
  flex:1;
  padding:20px;
}

/* top bar */
.top-bar{
  display:flex;
  align-items:center;
  justify-content:space-between;
  margin-bottom:20px;
}

/* title */
.top-bar h2{
  margin:auto;
  font-weight:600;
}

/* back button */
.back-btn{
  display:flex;
  align-items:center;
  justify-content:center;
  width:36px;
  height:36px;
  border-radius:50%;
  background:#fff;
  color:#333;
  text-decoration:none;
  box-shadow:0 2px 6px rgba(0,0,0,0.1);
  transition:0.2s;
}

.back-btn:hover{
  background:#eaeaea;
  transform:translateX(-2px);
}

/* links */
.link-area{
  margin-top:60px;
  padding-left:20px;
}

.link-area a{
  font-size:16px;
  text-decoration:none;
  color:#007bff;
}

.link-area a:hover{
  text-decoration:underline;
}


/* report / menu item */
.report-item{
  margin:12px 20px;
}

.report-item a{
  display:flex;
  align-items:center;
  justify-content:space-between;
  padding:14px 16px;
  background:#fff;
  border-radius:10px;
  text-decoration:none;
  color:#333;
  box-shadow:0 2px 8px rgba(0,0,0,0.06);
  transition:0.2s ease;
}

.report-item a:hover{
  transform:translateY(-2px);
  box-shadow:0 4px 12px rgba(0,0,0,0.12);
}

/* left side */
.report-item .left{
  display:flex;
  align-items:center;
  gap:10px;
  font-size:15px;
}

.report-item .left i{
  color:#007bff;
}

/* right arrow */
.report-item .fa-angle-right{
  color:#888;
}

</style>

<script>
document.addEventListener("keydown", function (event){
  if (event.ctrlKey || event.keyCode == 123){
    event.preventDefault();
  }
});
document.addEventListener('contextmenu', event => event.preventDefault());
</script>

</head>

<body>

<?php $this->load->view('header.php'); ?>

<div class="page-content">

  <!-- top bar -->
  <div class="top-bar">

    <!-- left empty for center balance -->
    <div style="width:36px;"></div>

    <h2>Transaction</h2>

    <!-- right back button -->
    <div>
      <a href="MainMenu" class="back-btn" title="Back">
        <i class="fa-solid fa-arrow-left"></i>
      </a>
    </div>

  </div>

  <!-- links -->
 <div class="report-item">
  <a href="Gatepass">
    <div class="left">
      <i class="fa-solid fa-file-lines"></i>
      Gatepass
    </div>
    <i class="fa-solid fa-angle-right"></i>
  </a>
</div>


</div>

<?php $this->load->view('footer.php'); ?>

</body>
</html>
