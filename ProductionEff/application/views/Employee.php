<?php
  defined('BASEPATH') OR exit('No direct script access allowed');

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Welcome to Gatepass </title>

    <link rel="stylesheet" type="text/css" href="\Gatepass\Assets\css\bootstrap.css">
    <link rel="stylesheet" type="text/css" href="\Gatepass\Assets\css\bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="\Gatepass\Assets\css\bootstrap-grid.css">
    <link rel="stylesheet" type="text/css" href="\Gatepass\Assets\css\bootstrap-grid.min.css">
    <link rel="stylesheet" type="text/css" href="\Gatepass\Assets\css\bootstrap-reboot.css">
    <link rel="stylesheet" type="text/css" href="\Gatepass\Assets\css\bootstrap-reboot.min.css">
    <script type="text/javascript" src="\Gatepass\Assets\js\bootstrap.bundle.js"></script>
    <script type="text/javascript" src="\Gatepass\Assets\js\bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="\Gatepass\Assets\js\bootstrap.js"></script>
    <script type="text/javascript" src="\Gatepass\Assets\js\bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />

    <!-- For Modal below link and scripts -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    <style type="text/css">
      
        body{
             font-size: 16px;  
             font-family: Times Roman New;     
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
            .dive1{
                  height: 550px;
                  width: 1%;
                  float:left;
                  overflow-x:hidden;
                  overflow-y:auto;
                }

           .dive2{
                  height: 550px;
                  width: 98%;
                  float:left;
                  overflow-x:auto;
                  overflow-y:auto;
                 }
           .dive3{
                  height: 35px;
                  width: 100%;
                  float:left;
                  overflow-x:auto;
                  overflow-y:auto;
                 }
           .dive4{
                  height: 35px;
                  width: 80%;
                  float:left;
                  overflow-x:auto;
                  overflow-y:auto;
                 }
            .dive5{
                  height: 35px;
                  width: 20%;
                  float:left;
                  overflow-x:auto;
                  overflow-y:auto;
                 }               

          .table{
                 overflow-x:auto;
                 overflow-y:auto; 
                 height: 300px; 
                 width: 100%;          
                }

              table {
              width: 99%;
              border-collapse: collapse;
              }
              th, td {
              padding: 8px;
              text-align: left;
              border: 1px solid #dee2e6;
              white-space: wrap; /* to prevent text wrapping */
              }
              .responsive-table {
              overflow-x: auto;
              }

           .div{overflow-x: auto;}

    </style>
    <script type="text/javascript">
 
 
     function printDiv(divID)
         {
             var divElem = document.getElementById(divID).innerHTML;
             var printWindow = window.open('', '', 'height=210,width=350'); 
             printWindow.document.write('<html><head><title></title></head>');
             printWindow.document.write('<body>');
             printWindow.document.write(divElem);
             printWindow.document.write('</body>');
             printWindow.document.write ('</html>');
             printWindow.document.close();
             printWindow.print();
          }
    </script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.5.5/angular.js"></script>
    <script type="text/javascript">
        var app = angular.module('MyApp', [])
        app.controller("MyController", ['$scope', '$http', function ($scope, $http) {
            $scope.items = [
                { CType: 'dropdown', ma1: 'Employee', ma: 'Mahesh Ready' },
                { CType: 'datepicker', ma3: 'From', Date: '04-06-2019' },
                { CType: 'datepicker', ma3: 'To', Date: '03-06-2019' }
            ];
 
            $scope.Employees = [{ EmpName: 'Mahesh Ready', FatherName: 'Narayana', DOB: '12/07/1995', DOJ: '02/01/2018', Amt: '19350'}];
        } ]);
 
        function fnExcelReport() {
            var tab_text = '<html xmlns:x="urn:schemas-microsoft-com:office:excel">';
            tab_text = tab_text + '<head><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet>';
            tab_text = tab_text + '<x:Name>Test Sheet</x:Name>';
            tab_text = tab_text + '<x:WorksheetOptions><x:Panes></x:Panes></x:WorksheetOptions></x:ExcelWorksheet>';
            tab_text = tab_text + '</x:ExcelWorksheets></x:ExcelWorkbook></xml></head><body>';
            tab_text = tab_text + "<table border='1px'>";
 
            // Remove Dynamic hidden controls.
            var list = $('#dvContainer1').find('.ng-hide');
            for (var i = list.length - 1; 0 <= i; i--) {
                if (list[i] && list[i].parentElement) {
                    list[i].parentElement.removeChild(list[i]);
                }
            }
 
            // Getting dynamic controll values.
            var list = $('#dvContainer1').find('.dvItems');
            var values = "";
            for (var i = 0; i <= list.length - 1; i++) {
                if (list[i] && list[i].parentElement) {
                    values += $(list[i]).text().trim();
                }
            }
            for (var i = 0; i <= list.length - 1; i++) {
                if (i == 0) {
                    // Replace last comma and assign value.
                    $($('#dvContainer1').find('.dvItems')[i]).text(values.replace(/,\s*$/, ""));
                }
                else {
                    $($('#dvContainer1').find('.dvItems')[i]).text("");
                }
            }
            tab_text = tab_text + $('#dvContainer1').html();
            tab_text = tab_text + '</table></body></html>';
            var data_type = 'data:application/vnd.ms-excel';
            var ua = window.navigator.userAgent;
            var msie = ua.indexOf("MSIE ");
 
            if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./)) {
                if (window.navigator.msSaveBlob) {
                    var blob = new Blob([tab_text], {
                        type: "application/vnd.ms-excel;charset=utf-8;"
                    });
                    navigator.msSaveBlob(blob, 'Coupon.xls');
                }
            } else {
                window.open('data:application/vnd.ms-excel,' + encodeURIComponent(tab_text));
            }
        }
    </script>
</head>
<body>

<?php $this->load->view('header.php');  ?>

   <div class="dive3"> 
      <div class="dive4"> </div>
      <div class="dive5"><a href="AddEmployees" class="btn btn-success btn-sm"> <img border="0" alt="Back" src="\Gatepass\Assets\Icon\Insert.jpg" width="25" height="25" title="Insert"></a> &nbsp;
             <a href="#" class="btn btn-success btn-sm" onclick="printDiv('displayData')">Print</a> &nbsp;
             <a href="#" class="btn btn-info btn-sm" onclick="fnExcelReport();">Export to Excel</a> &nbsp;
             <a href="Master"><img border="0" alt="Back" src="\Gatepass\Assets\Icon\Back.jpg" width="25" height="25" title="Back"></a>
      </div>
   </div>
   <div class="dive1">  </div>
   <div class="dive2"> 
     </br>

    &nbsp;&nbsp; <fieldset style= "border: 1px solid"> 
       



      <div class="table-responsive" id="dvContainer1"> 
        <div id="displayData" style="overflow-x:auto;">
          <legend><h5> Employee List </h5></legend> 
          <table border="2px" >

                <tr>
                   <th> SR No </th>
                   <th> Employee Code </th>
                   <th> Name </th>
                   <th> Mobile No </th>
                   <th> O Email Id </th>
                   <th> Joining Date </th>
                   <th> Department </th>
                   <th> Designation </th>
                   <th> Company </th>
                   <th> Site </th>
                   <th>

            <?php

                $query = "SELECT * FROM Employee Where CompanyId=".$_SESSION["sCompanyId"]." and Active='"."Yes"."' order by CompanyId,SiteId,EmployeeName ";

                $db_handle = new DBController();

                $result = $db_handle->runQuery($query);
               
                $srno=0;
                foreach ($result as $row) 
                {
                  $srno=$srno+1;
              ?>
                 
                <tr>
                   <td> <?php echo $srno;?> </td>
                   <td> <?php echo $row['EmployeeCode'];?> </td>
                   <td> <?php echo $row['EmployeeName'];?> </td>
                   <td> <?php echo $row['MobileNo'];?> </td>
                   <td> <?php echo $row['OfficialEmail'];?> </td>
                   <td> <?php echo substr($row['DateofJoining'],8,2).substr($row['DateofJoining'],4,4).substr($row['DateofJoining'],0,4);?> </td>
                   <td> <?php echo $row['DepartmentName'];?> </td>
                   <td> <?php echo $row['Designation'];?> </td>                
                   <td> <?php echo $row['CompanyName'];?> </td>
                   <td> <?php echo $row['SiteName'];?> </td>
                 </tr>
         
              <?php
                }
              ?>              
           </table>
      </div>           
     </div>       
    </fieldset>
   </div>
   <div class="dive1">  </div>
  
 <?php $this->load->view('footer.php'); ?>

</body>
</html>
