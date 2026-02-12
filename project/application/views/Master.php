<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$numbers = [113,115];

if (!in_array($_SESSION["sDepartmentId"], $numbers)) {
    echo '<script>alert("No access allowed to you...")</script>';
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Masters</title>

<!-- Font Awesome Icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<style>
html, body{
  height:100%;
  margin:0;
}

body{
  background:#f5f6fa;
  display:flex;
  flex-direction:column;
}

/* This will push footer down */
.page-content{
  flex:1;
}

/* Title + back */
.top-bar{
  display:flex;
  justify-content:space-between;
  align-items:center;
  margin:20px;
}

.top-bar h2{
  margin:0 auto;
}

/* List design */
.master-container{
  width:60%;
  margin:30px auto;
}

.master-item{
  margin-bottom:15px;
}

.master-item a{
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
  font-size:16px;
}

.master-item a:hover{
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

<div class="top-bar">
  <div></div>
  <h2>Master</h2>
  <a href="MainMenu" title="Back">
    <i class="fa-solid fa-arrow-left"></i>
  </a>
</div>

<div class="master-container">

  <div class="master-item">
    <a href="Company">
      <div class="left">
        <i class="fa-solid fa-building"></i>
        Company
      </div>
      <i class="fa-solid fa-angle-right"></i>
    </a>
  </div>

  <div class="master-item">
    <a href="Site">
      <div class="left">
        <i class="fa-solid fa-location-dot"></i>
        Site
      </div>
      <i class="fa-solid fa-angle-right"></i>
    </a>
  </div>

  <div class="master-item">
    <a href="Department">
      <div class="left">
        <i class="fa-solid fa-sitemap"></i>
        Department
      </div>
      <i class="fa-solid fa-angle-right"></i>
    </a>
  </div>

  <div class="master-item">
    <a href="Designation">
      <div class="left">
        <i class="fa-solid fa-id-badge"></i>
        Designation
      </div>
      <i class="fa-solid fa-angle-right"></i>
    </a>
  </div>

  <div class="master-item">
    <a href="Employee">
      <div class="left">
        <i class="fa-solid fa-users"></i>
        Employee
      </div>
      <i class="fa-solid fa-angle-right"></i>
    </a>
  </div>

</div>

<?php $this->load->view('footer.php'); ?>

</body>
</html>
