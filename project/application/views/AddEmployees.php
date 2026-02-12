<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Employee Master</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

<style>
body{
    font-size:16px;
}
.card{
    border:none;
    border-radius:10px;
    box-shadow:0 4px 12px rgba(0,0,0,0.08);
}
label{
    font-weight:600;
    margin-bottom:6px;
}
.form-control{
    border-radius:6px;
}
button{
    border-radius:6px;
}
</style>

<script>
function showHint(str) {
  if (str.length == 0) {
    document.getElementById("txtHint").innerHTML = "";
    return;
  }

  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("txtHint").innerHTML = this.responseText;
    }
  };

  xmlhttp.open("POST", "<?= base_url('Production/validateEmpcode'); ?>?q=" + str, true);
  xmlhttp.send();
}
</script>


</head>

<body class="d-flex flex-column min-vh-100">

<?php $this->load->view('header.php'); ?>

<div class="container-fluid flex-grow-1 mt-3 mb-3">

  <div class="d-flex justify-content-between align-items-center mb-3">
      <h3 class="mb-0">Employee Master</h3>
      <a href="Employee" class="btn btn-secondary btn-sm">Back</a>
  </div>

  <div class="card">
    <div class="card-body p-4">

<form action="Save_Employee" method="POST" enctype="multipart/form-data">

<!-- Code & Name -->
<div class="form-row">
  <div class="form-group col-md-4">
    <label>Employee Code</label>
    <input type="text" name="EmployeeCode" id="EmployeeCode"
           onkeyup="showHint(this.value)"
           class="form-control" required maxlength="7">
    <small id="txtHint" class="text-danger"></small>
  </div>

  <div class="form-group col-md-8">
    <label>Name</label>
    <input type="text" name="EmployeeName" class="form-control"
           required maxlength="100">
  </div>
</div>

<!-- Type -->
<div class="form-row">
  <div class="form-group col-md-3">
    <label>Employee Type</label>
    <select name="EmploymentType" class="form-control">
      <option>Staff</option>
      <option>Worker</option>
      <option>Contract</option>
      <option>Apprentice</option>
    </select>
  </div>

  <div class="form-group col-md-3">
    <label>User Type</label>
    <select name="UserType" class="form-control">
      <option>Admin</option>
      <option>User</option>
    </select>
  </div>

  <div class="form-group col-md-3">
    <label>Birth Date</label>
    <input type="date" name="DateofBirth" class="form-control" required>
  </div>

  <div class="form-group col-md-3">
    <label>Joining Date</label>
    <input type="date" name="DateofJoining" class="form-control" required>
  </div>
</div>

<!-- Company / Site -->
<div class="form-row">
  <div class="form-group col-md-6">
    <label>Company</label>
    <select name="CompanyId" class="form-control" required>
      <?php foreach ($Company as $row): ?>
        <option value="<?= $row['CompanyId']; ?>">
          <?= $row['CompanyName']; ?>
        </option>
      <?php endforeach; ?>
    </select>
  </div>

  <div class="form-group col-md-6">
    <label>Site</label>
    <select name="SiteId" class="form-control" required>
      <?php foreach ($Site as $row): ?>
        <option value="<?= $row['SiteId']; ?>">
          <?= $row['SiteName']; ?>
        </option>
      <?php endforeach; ?>
    </select>
  </div>
</div>

<!-- Department / Designation -->
<div class="form-row">
  <div class="form-group col-md-6">
    <label>Department</label>
    <select name="DepartmentId" class="form-control" required>
      <?php foreach ($Department as $row): ?>
        <option value="<?= $row['DepartmentId']; ?>">
          <?= $row['DepartmentName']; ?>
        </option>
      <?php endforeach; ?>
    </select>
  </div>

  <div class="form-group col-md-6">
    <label>Designation</label>
    <select name="DesignationId" class="form-control" required>
      <?php foreach ($Designation as $row): ?>
        <option value="<?= $row['DesignationId']; ?>">
          <?= $row['Designation']; ?>
        </option>
      <?php endforeach; ?>
    </select>
  </div>
</div>

<!-- Address -->
<div class="form-group">
  <label>Address</label>
  <input type="text" name="Address" class="form-control" required>
</div>

<div class="form-row">
  <div class="form-group col-md-3">
    <label>City</label>
    <input type="text" name="City" class="form-control" required>
  </div>
  <div class="form-group col-md-3">
    <label>Pin</label>
    <input type="text" name="Pin" class="form-control" required>
  </div>
  <div class="form-group col-md-3">
    <label>State</label>
    <input type="text" name="State" class="form-control" required>
  </div>
  <div class="form-group col-md-3">
    <label>Country</label>
    <input type="text" name="Country" class="form-control" required>
  </div>
</div>

<!-- Contact -->
<div class="form-row">
  <div class="form-group col-md-3">
    <label>Office Mail</label>
    <input type="email" name="OfficialEmail" class="form-control">
  </div>
  <div class="form-group col-md-3">
    <label>Personal Mail</label>
    <input type="email" name="PersonalEmail" class="form-control">
  </div>
  <div class="form-group col-md-3">
    <label>Mobile</label>
    <input type="text" name="MobileNo" class="form-control" required>
  </div>
  <div class="form-group col-md-3">
    <label>Gender</label>
    <select name="Gender" class="form-control">
      <option>Male</option>
      <option>Female</option>
    </select>
  </div>
</div>

<!-- Save -->
<div class="text-center mt-4">
  <button type="submit" class="btn btn-primary px-5 shadow">
    Save Employee
  </button>
</div>

</form>

    </div>
  </div>

</div>

<?php $this->load->view('footer.php'); ?>

</body>
</html>
