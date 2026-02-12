<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$today = date('Y-m-d');
$fmday = date('Y-m-01');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Gatepass</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
/* ===== Sticky Footer Layout ===== */
html, body{
    height:100%;
    margin:0;
}

.page-wrapper{
    min-height:100vh;
    display:flex;
    flex-direction:column;
}

.content-area{
    flex:1;
}

/* ===== Page UI ===== */
.page-title{
    font-weight:600;
}

.card{
    border:none;
    border-radius:10px;
    box-shadow:0 2px 10px rgba(0,0,0,0.08);
}

.table thead th{
    background:#f8f9fa;
    font-weight:600;
    font-size:14px;
}

.table td{
    font-size:13px;
}

.action-btn img{
    width:20px;
    height:20px;
}
</style>

<script>
function printDiv(divID){
    var divElem = document.getElementById(divID).innerHTML;
    var printWindow = window.open('', '', 'height=600,width=900');
    printWindow.document.write('<html><body>');
    printWindow.document.write(divElem);
    printWindow.document.write('</body></html>');
    printWindow.document.close();
    printWindow.print();
}
</script>

</head>

<body>

<?php $this->load->view('header.php'); ?>

<div class="page-wrapper">

<div class="content-area container-fluid mt-3">

    <!-- Top Bar -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="page-title">Gatepass List</h4>
        <a href="Transaction" class="btn btn-secondary btn-sm">
            <i class="fa fa-arrow-left"></i> Back
        </a>
    </div>

    <!-- Filter Card -->
    <div class="card mb-3">
        <div class="card-body">
            <form method="GET" class="form-inline">

                <label class="mr-2">From</label>
                <input type="date" name="from_date" value="<?php echo $fmday; ?>" class="form-control mr-3" required>

                <label class="mr-2">To</label>
                <input type="date" name="to_date" value="<?php echo $today; ?>" class="form-control mr-3" required>

                <button type="submit" class="btn btn-primary mr-2">
                    <i class="fa fa-search"></i> Filter
                </button>

                <button type="button" class="btn btn-success mr-2" onclick="printDiv('displayData')">
                    Print
                </button>

                <a href="Addgatepass" class="btn btn-info">
                    Add New
                </a>

            </form>
        </div>
    </div>

    <!-- Table Card -->
    <div class="card">
        <div class="card-body table-responsive" id="displayData">

        <?php
        if (isset($_GET['from_date']) && isset($_GET['to_date'])) {

            $from_date = $_GET['from_date'];
            $to_date = $_GET['to_date'];

            $host='localhost';
            $db='training';
            $user='root';
            $passwd='root';
            $port=3307;

            $gconn = new PDO("mysql:host={$host};port={$port};dbname={$db}", $user, $passwd);

            $sql = "SELECT * FROM v_gatepass 
                    WHERE CompanyId=".$_SESSION["sCompanyId"]." 
                    AND SiteId=".$_SESSION["sSiteId"]." 
                    AND gatepassdate BETWEEN :from_date AND :to_date
                    ORDER BY gatepassdate,gatepassno";

            $stmt = $gconn->prepare($sql);
            $stmt->execute([
                ':from_date' => $from_date,
                ':to_date' => $to_date
            ]);

            $events = $stmt->fetchAll(PDO::FETCH_ASSOC);
        ?>

        <table class="table table-bordered table-sm">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Date</th>
                    <th>Code</th>
                    <th>Name</th>
                    <th>Department</th>
                    <th>Designation</th>
                    <th>Type</th>
                    <th>Out</th>
                    <th>In</th>
                    <th>Total</th>
                    <th>Reason</th>
                    <th>Location</th>
                    <th>KM</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

            <?php foreach ($events as $row) { ?>
                <tr>
                    <td><?php echo $row['GatepassId']."/".$row['gatepassno']; ?></td>
                    <td><?php echo date("d-m-Y", strtotime($row['gatepassdate'])); ?></td>
                    <td><?php echo $row['EmployeeCode']; ?></td>
                    <td><?php echo $row['EmployeeName']; ?></td>
                    <td><?php echo $row['DepartmentName']; ?></td>
                    <td><?php echo $row['Designation']; ?></td>
                    <td><?php echo $row['gptype']; ?></td>
                    <td><?php echo sprintf('%02d',$row['outhh']).":".sprintf('%02d',$row['outmm']); ?></td>
                    <td><?php echo sprintf('%02d',$row['inhh']).":".sprintf('%02d',$row['inmm']); ?></td>
                    <td><?php echo sprintf('%02d',$row['tothh']).":".sprintf('%02d',$row['totmm']); ?></td>
                    <td><?php echo $row['leavereason']; ?></td>
                    <td><?php echo $row['location']; ?></td>
                    <td><?php echo $row['kilometer']; ?></td>
                    <td>

                        <form action="Editgatepass" method="POST" style="display:inline;">
                            <input type="hidden" name="GatepassId" value="<?php echo $row['GatepassId'];?>">
                            <button class="action-btn" title="Edit">
                                <img src="\Gatepass\Assets\Icon\Edit.jpg">
                            </button>
                        </form>

                        <form method="GET" style="display:inline;">
                            <input type="hidden" name="GatepassId" value="<?php echo $row['GatepassId'];?>">
                            <input type="hidden" name="Delete" value="Delete">
                            <button class="action-btn" title="Delete">
                                <img src="\Gatepass\Assets\Icon\Delete.jpg">
                            </button>
                        </form>

                    </td>
                </tr>
            <?php } ?>

            </tbody>
        </table>

        <?php } ?>

        </div>
    </div>

</div>

<?php $this->load->view('footer.php'); ?>

</div>

</body>
</html>
