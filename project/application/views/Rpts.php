<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Reports</title>

<!-- Bootstrap -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>
body{
  background:#f5f6fa;
  font-family: Arial, Helvetica, sans-serif;
  min-height:100vh;
  display:flex;
  flex-direction:column;
}

/* footer bottom */
.page-content{
  flex:1;
  padding:20px;
}

/* title + back */
.top-bar{
  display:flex;
  align-items:center;
  justify-content:space-between;
  margin-bottom:25px;
}

.top-bar h2{
  margin:0 auto;
  font-weight:600;
}

/* minimal back */
.back-btn{
  width:36px;
  height:36px;
  border-radius:50%;
  background:#fff;
  display:flex;
  align-items:center;
  justify-content:center;
  color:#333;
  text-decoration:none;
  box-shadow:0 2px 6px rgba(0,0,0,0.1);
  transition:0.2s;
}
.back-btn:hover{
  background:#eaeaea;
  transform:translateX(-2px);
}

/* report list */
.report-container{
  max-width:500px;
  margin:0 auto;
}

.report-item{
  margin-bottom:15px;
}

.report-item a{
  display:flex;
  align-items:center;
  justify-content:space-between;
  padding:14px 18px;
  border-radius:8px;
  background:#fff;
  color:#333;
  text-decoration:none;
  box-shadow:0 3px 8px rgba(0,0,0,0.08);
  transition:0.3s;
}

.report-item a:hover{
  transform:translateX(6px);
  background:#eaeaea;
}

.left{
  display:flex;
  align-items:center;
  gap:12px;
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

  <!-- 🔹 Title -->
  <div class="top-bar">
    <div></div>
    <h2>Reports</h2>
    <a href="MainMenu" class="back-btn" title="Back">
      <i class="fa-solid fa-arrow-left"></i>
    </a>
  </div>

  <!-- 🔹 Report Links -->
  <div class="report-container">

    <div class="report-item">
      <a href="Rpts001">
        <div class="left">
          <i class="fa-solid fa-file-lines"></i>
          Gatepass Summary
        </div>
        <i class="fa-solid fa-angle-right"></i>
      </a>
    </div>

  </div>

</div>

<?php $this->load->view('footer.php'); ?>

</body>
</html>
