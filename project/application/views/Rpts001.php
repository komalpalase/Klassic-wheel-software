<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$MMMM = date('m');
$YYYY = date('Y');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Gatepass Summary</title>

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

.page-content{
  flex:1;
  padding:20px;
}

/* top */
.top-bar{
  display:flex;
  justify-content:space-between;
  align-items:center;
  margin-bottom:20px;
}

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
}
.back-btn:hover{
  background:#eaeaea;
}

/* filter card */
.filter-card{
  background:#fff;
  padding:15px;
  border-radius:8px;
  box-shadow:0 3px 8px rgba(0,0,0,0.08);
  margin-bottom:20px;
}

/* table */
.table thead th{
  background:#343a40;
  color:#fff;
  font-weight:500;
}
</style>

<script>
function printDiv(divID){
  var divElem = document.getElementById(divID).innerHTML;
  var printWindow = window.open('', '', 'height=600,width=900');
  printWindow.document.write('<html><body>'+divElem+'</body></html>');
  printWindow.document.close();
  printWindow.print();
}
</script>

</head>

<body>

<?php $this->load->view('header.php'); ?>

<div class="page-content">

  <!-- 🔹 Top -->
  <div class="top-bar">
    <h4 class="m-0">Gatepass Summary</h4>
    <a href="Rpts" class="back-btn" title="Back">
      <i class="fa-solid fa-arrow-left"></i>
    </a>
  </div>

  <!-- 🔹 Filter -->
  <div class="filter-card">
    <form method="GET">
      <div class="form-row align-items-end">

        <div class="form-group col-md-2">
          <label>Year</label>
          <input type="text" name="YYYY" value="<?php echo $YYYY; ?>" class="form-control" required>
        </div>

        <div class="form-group col-md-2">
          <label>Month</label>
          <input type="text" name="MM" value="<?php echo intval($MMMM); ?>" class="form-control" required>
        </div>

        <div class="form-group col-md-4">
          <label>Employee</label>
          <select name="EmployeeCode" class="form-control" required>
            <option value="0">Select</option>
            <?php
              $db_handle = new DBController();
              $query = "SELECT * FROM Employee Where Companyid=".$_SESSION["sCompanyId"]." 
                        and Siteid=".$_SESSION["sSiteId"]." 
                        and active='Yes' order by EmployeeName";                  
              $Employee = $db_handle->runQuery($query);
              foreach ($Employee as $row){
            ?>
              <option value="<?php echo $row['EmployeeCode'];?>">
                <?php echo $row['EmployeeName']." [ ".$row['EmployeeCode']." ] "; ?>
              </option>
            <?php } ?>
          </select>
        </div>

        <div class="form-group col-md-4">
          <button class="btn btn-primary">
            <i class="fa fa-search"></i> Search
          </button>

          <button type="button" class="btn btn-success" onclick="printDiv('displayData')">
            Print
          </button>

          <button type="button" class="btn btn-info" onclick="fnExcelReport();">
            Excel
          </button>
        </div>

      </div>
    </form>
  </div>

  <!-- 🔹 Data -->
  <div class="card">
    <div class="card-body table-responsive" id="dvContainer1">
      <div id="displayData">
        <h5 class="mb-3">Gatepass List</h5>

<?php
if (isset($_GET['YYYY'])) {  
  $yyyy = $_GET['YYYY'];
  $mm = $_GET['MM'];

  $host='localhost';
  $db='training';
  $user='root';
  $passwd='root';
  $port=3307;

  $gconn = new PDO("mysql:host={$host};port={$port};dbname={$db}", $user, $passwd);   

  if ($_GET['EmployeeCode']==0){
    $sql = "SELECT * FROM v_gatepasssum_hhmm 
            WHERE CompanyId=".$_SESSION["sCompanyId"]." 
            and SiteId=".$_SESSION["sSiteId"]." 
            and gatepassyyyy = :YYYY AND gatepassmm = :mm 
            order by gptype,EmployeeName";
  } else {
    $sql = "SELECT * FROM v_gatepasssum_hhmm 
            WHERE CompanyId=".$_SESSION["sCompanyId"]." 
            and EmployeeCode='".$_GET['EmployeeCode']."' 
            and gatepassyyyy = :YYYY AND gatepassmm = :mm 
            order by gptype,EmployeeName";
  }

  $stmt = $gconn->prepare($sql);
  $stmt->execute([':YYYY'=>$yyyy, ':mm'=>$mm]);
  $events = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<table class="table table-bordered table-hover">
  <thead>
    <tr>
      <th>Code</th>
      <th>Name</th>
      <th>Department</th>
      <th>Designation</th>
      <th>Type</th>
      <th>YYYY</th>
      <th>MM</th>
      <th>Total Minutes</th>
      <th>In Hours</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($events as $row) { ?>
    <tr>
      <td><?php echo $row['EmployeeCode'];?></td>
      <td><?php echo $row['EmployeeName'];?></td>
      <td><?php echo $row['DepartmentName'];?></td>
      <td><?php echo $row['Designation'];?></td>
      <td><?php echo $row['gptype'];?></td>
      <td><?php echo $yyyy;?></td>
      <td><?php echo $mm;?></td>
      <td><?php echo $row['TotMinutes'];?></td>
      <td><?php echo $row['TotHHmm'];?></td>
    </tr>
    <?php } ?>
  </tbody>
</table>

<?php } ?>

      </div>
    </div>
  </div>

</div>

<?php $this->load->view('footer.php'); ?>

</body>
</html>
