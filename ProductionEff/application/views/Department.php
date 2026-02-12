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
         .divm1{
                height: 30px;
                width: 95%;
                float: left;

               }
        .divm2{
                height: 30px;
                width: 5%;
                float:left;

               }       
          .div1{
                height: 550px;
              	width: 45%;
              	float:left;
              }

         .div2{
                height: 550px;
              	width: 54%;
              	float:left;
                overflow-x:hidden;
                overflow-y:auto;
              }
         .div3{
                height: 550px;
                width: 1%;
                float:left;
              }

        .table{
               overflow-x:hidden;
               overflow-y:auto; 
               height: 300px; 
               width: 100%;          
              }

        table, th, td {
                border: 1px solid black;
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

   <div class="divm1"><center></center> </div>
   <div class="divm2"><a href="Master"><img border="0" alt="Back" src="\Gatepass\Assets\Icon\Back.jpg" width="25" height="25" title="Back"></a></div>

   <div class="div3"> 
   </div>
   <div class="div2"> 
     </br>

    &nbsp;&nbsp; <fieldset style= "border: 1px solid"> 
       

       <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
             <a href="#" class="btn btn-success btn-sm" onclick="printDiv('displayData')">Print</a> &nbsp;
             <a href="#" class="btn btn-info btn-sm" onclick="fnExcelReport();">Export to Excel</a>

      <div class="table-responsive" id="dvContainer1"> 
        <div id="displayData">
          <legend><h5> Department List </h5></legend> 
          <table border="2px" >

                <tr>
                   <td>
                     Department Id
                   </td>
                   <td>
                     Department Name
                   </td>
                   
                 </tr>

            <?php

                $query = "SELECT * FROM DeptMaster order by DepartmentId";

                $db_handle = new DBController();

                $result = $db_handle->runQuery($query);
               
                foreach ($result as $row) 
                {
              ?>

                <tr>
                   <td>
                     <?php echo $row['DepartmentId'];?>
                   </td>
                   <td>
                     <?php echo $row['DepartmentName'];?>
                   </td>
                 </tr>
         
              <?php
                }
              ?>              
           </table>
      </div>           
     </div>       
    </fieldset>
   </div>

   

    <div class="div1">
      <br>

    <form  action="Save_Dept" method="POST" enctype="multipart/form-data">
      <br>
     <fieldset style= "border: 1px solid">
       <legend><h5> New Department </h5></legend> 
        <span>&nbsp; Department Id :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
        <input type="text" name="DepartmentId" required readonly value="
          <?php
             //	$DepartmentId=0;

              $host='localhost';
              $db='training';
              $user='root';
              $passwd='root';  //npd#$123
              $port=3307;
              $gconn = new PDO("mysql:host={$host};port={$port};dbname={$db}", $user, $passwd);   

              $query = "SELECT max(DepartmentId) as DepartmentId from DeptMaster" ;

     //         $db_handle = new DBController();
    //          $results = $db_handle->runQuery($query);

              $statement = $gconn->prepare($query);
              $statement->execute();                               
              $results = $statement->fetch(PDO::FETCH_ASSOC);

              if ($results)
               {
                If ($results['DepartmentId']==0)
                {echo ($DepartmentId);}
                 else
                 { $DepartmentId=$results['DepartmentId']+1;
                 echo ($DepartmentId);
                 }
               }
                 else
                 {echo $DepartmentId;}
                ?>"> 

        </br></br>

        <span>&nbsp; Department Name :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> 
        <input type="text" name="DepartmentName" required placeholder="Department Name" size="60" maxlength="100">
        </br></br>

       <span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> 
      
  	   <button name="Submit" value ="Submit"> Save </button>

       </br></br>
     </fieldset>

	</form>

</div>
 <?php $this->load->view('footer.php'); ?>

</body>
</html>
