<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    $MMMM = date('m');
    $YYYY = date('Y');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Welcome to Gatepass </title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
                height: 5px;
                width: 10%;
                float:left;
              }

         .div2{
                height: 510px;
                width: 99%;
                float:left;
                overflow-x:hidden;
                overflow-y:auto;
              }
         .div3{
                height: 20px;
                width: 80%;
                float:left;
              }
         .div4{
                height: 510px;
                width: 1%;
                float:left;
              }
          table {
              width: 99%;
              border-collapse: collapse;
              }
        th, td {
              padding: 0px;
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


        function showEmp(str) {
        
          if (str.length == 0) {
            document.getElementById("EmployeeCode").innerHTML = "";
            return;
          } else {

            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
              if (this.readyState == 4 && this.status == 200) {
                document.getElementById("EmployeeCode").innerHTML = this.responseText;
              }
            };
            xmlhttp.open("POST", "http://localhost/Gatepass/application/views/SearchEmpcode.php?q=" + str, true);
          //  xmlhttp.open("GET", "/training/ValidateEmpcode.php?q=" + str, true);
            xmlhttp.send();
     }
   }
 
 
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
   <div class="divm2"><a href="
    Rpts"><img border="0" alt="Back" src="\Gatepass\Assets\Icon\Back.jpg" width="25" height="25" title="Back"></a></div>

    &nbsp;&nbsp; <fieldset style= "border: 1px solid"> 
   <div class="div1">  </div>
   

        <div class="div3">  
            <table align="center" >
            <tr>
              <form action = "" method="GET">

                <td> Year :</td>
                <td><input type="text" id="YYYY" name="YYYY" value="<?php echo $YYYY; ?>" required ></td>
                <td> Month :</td>
                <td><input type="text" id="MMMM" name="MM" value="<?php echo intval($MMMM); ?>" required ></td>

                <td>  <select name="EmployeeCode" required onchange="showEmp(this.value)">
                                      <option value="0"> Select </option>
                                     <?php
                                    //  require_once("DBController.php");
                                      $db_handle = new DBController();

                                       $query = "SELECT * FROM Employee Where Companyid=".$_SESSION["sCompanyId"]." and
                                       Siteid=".$_SESSION["sSiteId"]." and active='"."Yes"."' order by EmployeeName";                  

                                      $Employee = $db_handle->runQuery($query);

                                      if ($Employee)
                                       {
                                        // echo $usermaster['UserId'] . '. ' . $usermaster['UserName'];
                                       } else
                                       {
                                        alert("Employee not found....");
                                       }
                                        foreach ($Employee as $row) 
                                        {
                                      ?>
                                          <option value="<?php echo $row['EmployeeCode'];?>">
                                           <?php echo $row['EmployeeName']." [ ".$row['EmployeeCode']." ] "; ?>
                                          </option>

                                      <?php
                                        }
                                      ?>               
                              </select> 
                              
                              <span id="EmployeeCode"></span> 
                            </td>



                <td> <button type="Submit" value="Filter" ><i class="fa fa-search"></i></button> </td>
      
                <td> <a href="#" class="btn btn-success btn-sm" onclick="printDiv('displayData')">Print</a> &nbsp;
                     <a href="#" class="btn btn-info btn-sm" onclick="fnExcelReport();">Export to Excel</a>
                </td>
              </form>
            </tr>               
            </table> 

        </div>
    <div class="div1">  </div>
  <!--  <div class="div4">  </div>  -->
    <div class="div2"> 
      <div class="table-responsive" id="dvContainer1"> 
        <div id="displayData">
     
          <legend><h5> Gatepass List </h5></legend> 
       <?php
          if (isset($_GET['YYYY'])) 
            {  
              // Assuming you have a database connection established
              $yyyy = $_GET['YYYY'];
              $mm = $_GET['MM'];

              $host='localhost';
              $db='training';
              $user='root';
              $passwd='root';  //npd#$123
              $port=3307;
              $gconn = new PDO("mysql:host={$host};port={$port};dbname={$db}", $user, $passwd);   

              // Prepare the SQL query to filter records within the date range
              If ($_GET['EmployeeCode']==0)
                {

                 $sql = "SELECT * FROM v_gatepasssum_hhmm WHERE CompanyId=".$_SESSION["sCompanyId"]." and SiteId=".$_SESSION["sSiteId"]." and gatepassyyyy = :YYYY AND gatepassmm = :mm order by gptype,EmployeeName";
                }else {

                 $sql = "SELECT * FROM v_gatepasssum_hhmm WHERE CompanyId=".$_SESSION["sCompanyId"]." and EmployeeCode='".$_GET['EmployeeCode']."' and gatepassyyyy = :YYYY AND gatepassmm = :mm order by gptype,EmployeeName";
                }


              // Use PDO to prepare and execute the query
              $stmt = $gconn->prepare($sql);
              $stmt->execute([
                  ':YYYY' => $yyyy,
                  ':mm' => $mm
              ]);

              // Fetch the results
              $events = $stmt->fetchAll(PDO::FETCH_ASSOC);

              // Display the results

                  ?>
                       <table>

                              <tr>

                                 <th> Code </th>
                                 <th> Name </th>
                                 <th> Department </th>
                                 <th> Designation </th>
                                 <th> Gatepass Type </th>
                                 <th> YYYY </th>
                                 <th> MM </th>
                                 <th> Total Minutes </th>
                                 <th> In Hours </th>

                                 <th>  </th>
                              </tr>
                   <?php
                              foreach ($events as $row) 
                              {
                        
                   ?>
                           <tr>
                             <td> <?php echo $row['EmployeeCode'];?> </td>
                             <td> <?php echo $row['EmployeeName'];?> </td>                  
                             <td> <?php echo $row['DepartmentName'];?> </td>
                             <td> <?php echo $row['Designation'];?> </td>  
                             <td> <?php echo $row['gptype'];?> </td>  
                             <td> <?php echo $yyyy;?> </td>
                             <td> <?php echo $mm;?> </td>
                             <td> <?php echo $row['TotMinutes'];?> </td>
                             <td> <?php echo $row['TotHHmm'];?> </td>

  
                             <td> 
                               

                            </td>  
                          </tr>
                       
                      <?php
                        }
                      ?>              
                         </table>

                      <?php
                        }
                      ?>

              
                    

      </div>           
     </div>       
    </fieldset>
   </div>



 <?php $this->load->view('footer.php'); ?>

</body>
</html>


