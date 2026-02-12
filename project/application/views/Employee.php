<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Employee List</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>
html,body{
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

.card{
    border:none;
    border-radius:10px;
    box-shadow:0 2px 10px rgba(0,0,0,0.08);
}

/* Scrollable table */
.table-scroll{
    max-height:500px;
    overflow-y:auto;
}

/* Sticky header */
.table-scroll thead th{
    position:sticky;
    top:0;
    background:#f8f9fa;
    z-index:2;
    font-weight:600;
}

/* Back button */
.back-btn{
    display:inline-flex;
    align-items:center;
    justify-content:center;
    width:36px;
    height:36px;
    border-radius:50%;
    background:#f5f5f5;
    color:#333;
    text-decoration:none;
    box-shadow:0 2px 6px rgba(0,0,0,0.08);
    transition:0.2s;
}
.back-btn:hover{
    background:#e0e0e0;
    transform:translateX(-2px);
}
</style>

<script>
function printDiv(divID){

    var divElem = document.getElementById(divID).innerHTML;

    var printWindow = window.open('', '', 'height=800,width=1000');

    printWindow.document.write(`
        <html>
        <head>
            <title>Employee List</title>
            <style>
                @page { size: A4; margin: 15mm; }
                body { font-family: Arial; }
                h4 { text-align:center; margin-bottom:20px; }
                table { border-collapse: collapse; width: 100%; }
                table, th, td { border: 1px solid black; }
                th, td { padding: 6px; font-size: 12px; }
                th { background: #f2f2f2; }
            </style>
        </head>
        <body>
            <h4>Employee List</h4>
            ${divElem}
        </body>
        </html>
    `);

    printWindow.document.close();
    printWindow.focus();
    printWindow.print();
}

function exportCSV() {

    var table = document.querySelector("#displayData table");
    var rows = table.querySelectorAll("tr");

    var csv = [];

    for (var i = 0; i < rows.length; i++) {
        var cols = rows[i].querySelectorAll("td, th");
        var row = [];

        for (var j = 0; j < cols.length; j++) {
            var cellText = cols[j].innerText.replace(/"/g, '""');

            // Force Excel to treat as TEXT to avoid ####
            row.push('="' + cellText + '"');
        }

        csv.push(row.join(","));
    }

    var csvFile = new Blob([csv.join("\n")], { type: "text/csv" });
    var downloadLink = document.createElement("a");

    downloadLink.download = "Employee_List.csv";
    downloadLink.href = window.URL.createObjectURL(csvFile);
    downloadLink.style.display = "none";

    document.body.appendChild(downloadLink);
    downloadLink.click();
}
</script>
</head>

<body>

<?php $this->load->view('header.php'); ?>

<div class="page-wrapper">

<div class="content-area container-fluid mt-3">

    <!-- Top Bar -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>Employee List</h4>

        <div class="d-flex align-items-center">

            <a href="AddEmployees" class="btn btn-success btn-sm mr-2">
                <i class="fa fa-plus"></i> Add
            </a>

            <button class="btn btn-secondary btn-sm mr-2" onclick="printDiv('displayData')">
                Print
            </button>

            <button class="btn btn-info btn-sm mr-3" onclick="exportCSV();">
                Export CSV
            </button>

            <a href="Master" class="back-btn">
                <i class="fa-solid fa-arrow-left"></i>
            </a>
        </div>
    </div>

    <!-- Table -->
    <div class="card">
        <div class="card-body table-scroll table-responsive">

        <div id="displayData">
        <table class="table table-bordered table-hover table-sm mb-0">
            <thead>
                <tr>
                    <th>SR No</th>
                    <th>Employee Code</th>
                    <th>Name</th>
                    <th>Mobile</th>
                    <th>Email</th>
                    <th>Joining</th>
                    <th>Department</th>
                    <th>Designation</th>
                    <th>Company</th>
                    <th>Site</th>
                </tr>
            </thead>
            <tbody>

            <?php
            $query = "SELECT e.*, 
                             d.DepartmentName, 
                             c.CompanyName, 
                             s.SiteName, 
                             des.Designation
                      FROM EmployeeMaster e
                      LEFT JOIN deptmaster d ON e.DepartmentId = d.DepartmentId
                      LEFT JOIN companymaster c ON e.CompanyId = c.CompanyId
                      LEFT JOIN sitemaster s ON e.SiteId = s.SiteId
                      LEFT JOIN desgmaster des ON e.DesignationId = des.DesignationId
                      WHERE e.CompanyId = ".$_SESSION['sCompanyId']."
                      ORDER BY e.CompanyId, e.SiteId, e.EmployeeName";

            $db_handle = new DBController();
            $result = $db_handle->runQuery($query);

            $srno=0;
            if($result){
                foreach ($result as $row){
                    $srno++;
            ?>
                <tr>
                    <td><?= $srno;?></td>
                    <td><?= $row['EmployeeCode'];?></td>
                    <td><?= $row['EmployeeName'];?></td>
                    <td><?= $row['MobileNo'];?></td>
                    <td><?= $row['OfficialEmail'];?></td>
                    <td><?= date("d-m-Y", strtotime($row['DateofJoining']));?></td>
                    <td><?= $row['DepartmentName'];?></td>
                    <td><?= $row['Designation'];?></td>
                    <td><?= $row['CompanyName'];?></td>
                    <td><?= $row['SiteName'];?></td>
                </tr>
            <?php 
                }
            }
            ?>

            </tbody>
        </table>
        </div>

        </div>
    </div>

</div>

<?php $this->load->view('footer.php'); ?>

</div>

</body>
</html>
