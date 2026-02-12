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
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
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
        .divem1{
              height: 550px;
              width: 3%;
              float:left;
              overflow-x:hidden;
              overflow-y:auto;
            }

       .divem2{
              height: 550px;
              width: 94%;
              float:left;
              overflow-x:hidden;
              overflow-y:auto;
             }
 

      .table {
                height: 100%; 
                width: 100%;
                border-collapse: collapse;
                overflow-x:hidden;
                overflow-y:auto; 
            }
            th, td {
                padding: 8px;
                text-align: left;
                border: 1px solid #dee2e6;
                white-space: nowrap; /* to prevent text wrapping */
            }
       .responsive-table {
            overflow-x: auto;
            }



    </style>
    <script>
        function showHint(str) {

          if (str.length == 0) {
            document.getElementById("txtHint").innerHTML = "";
            return;
          } else {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
              if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
              }
            };
            xmlhttp.open("POST", "http://localhost/Gatepass/application/views/ValidateEmpcode.php?q=" + str, true);
          //  xmlhttp.open("GET", "/Gatepass/ValidateEmpcode.php?q=" + str, true);
            xmlhttp.send();
          }
        }
    </script>
</head>
<body>
  <?php $this->load->view('header.php'); ?>

   <div class="divm1"><center><h3>Employee Master</h3></center> </div>
   <div class="divm2"><a href="Employee"><img border="0" alt="Back" src="\Gatepass\Assets\Icon\Back.jpg" width="25" height="25" title="Back"></a></div>

   </div>
 <div class="divem1"></div>
  <div class="divem2">
    <form  action="Save_Employee" method="POST" enctype="multipart/form-data">
     <center> 
     <fieldset style= "border: 1px solid">
       
        <table>
       
          <tr>
            <td> Employee Code : </td>
            <td colspan="5"> <input type="text" name="EmployeeCode" id="EmployeeCode" onkeyup="showHint(this.value)" required placeholder="Employee Code" size="15" maxlength="7"> <span id="txtHint"></span>
            </td>
          </tr>
          <tr>
            <td> Name : </td>
            <td colspan="5"> <input type="text" name="EmployeeName" required placeholder="Employee Name" size="40" maxlength="100"> </td>
          </tr>
          <tr>
                <td> Employee Type : </td>
                <td>           
                      <select name="EmploymentType">
                       <option value="Staff"> Staff </option>
                       <option value="Worker"> Worker </option>
                       <option value="Contract"> Contract </option>
                       <option value="Apprentice"> Apprentice </option>
                      </select>
               </td>
                <td> User Type : </td>
                <td>           
                      <select name="UserType">
                       <option value="Admin"> Admin </option>
                       <option value="User"> User </option>
                      </select> 
               </td>
          </tr>
          <tr>
            <td> Company : </td>
            <td>             
                <select name="CompanyId">
                       <?php
                      //  require_once("DBController.php");
                        $db_handle = new DBController();
                        $query = "SELECT CompanyId,CompanyName FROM CompanyMaster order by CompanyName";
                        $Company = $db_handle->runQuery($query);

                        if ($Company)
                         {
                          // echo $usermaster['UserId'] . '. ' . $usermaster['UserName'];
                         } else
                         {
                          alert("Company not found....");
                         }
                          foreach ($Company as $row) 
                          {
                        ?>
                            <option value="<?php echo $row['CompanyId'];?>">
                             <?php echo $row['CompanyName'];?>
                            </option>

                        <?php
                          }
                        ?>               
                </select>
              </td>

            <td> Site : </td>
            <td colspan="5">             
                <select name="SiteId">
                       <?php
                      //  require_once("DBController.php");
                        $db_handle = new DBController();
                        $query = "SELECT SiteId,SiteName FROM SiteMaster order by SiteName";
                        $Site = $db_handle->runQuery($query);

                        if ($Site)
                         {
                          // echo $usermaster['UserId'] . '. ' . $usermaster['UserName'];
                         } else
                         {
                          alert("Site not found....");
                         }
                          foreach ($Site as $row) 
                          {
                        ?>
                            <option value="<?php echo $row['SiteId'];?>">
                             <?php echo $row['SiteName'];?>
                            </option>

                        <?php
                          }
                        ?>               
                </select>
              </td>
          </tr>
          <tr>
            <td> Department : </td>
            <td>             
             <select name="DepartmentId">
                       <?php
                      //  require_once("DBController.php");
                        $db_handle = new DBController();
                        $query = "SELECT DepartmentId,DepartmentName FROM DeptMaster order by DepartmentName";
                        $Department = $db_handle->runQuery($query);

                        if ($Department)
                         {
                          // echo $usermaster['UserId'] . '. ' . $usermaster['UserName'];
                         } else
                         {
                          alert("Department not found....");
                         }
                          foreach ($Department as $row) 
                          {
                        ?>
                            <option value="<?php echo $row['DepartmentId'];?>">
                             <?php echo $row['DepartmentName'];?>
                            </option>

                        <?php
                          }
                        ?>                 
             </select>
              </td>
            <td> Designation : </td>
            <td colspan="5">             
             <select name="DesignationId" id="fetchDesg">
                      <?php
                      //  require_once("DBController.php");
                        $db_handle = new DBController();
                        $query = "SELECT DesignationId,Designation FROM DesgMaster order by Designation";
                        $Designation = $db_handle->runQuery($query);

                        if ($Designation)
                         {
                          // echo $usermaster['UserId'] . '. ' . $usermaster['UserName'];
                         } else
                         {
                          alert("Designation not found....");
                         }
                          foreach ($Designation as $row) 
                          {
                        ?>
                            <option value="<?php echo $row['DesignationId'];?>">
                             <?php echo $row['Designation'];?>
                            </option>

                        <?php
                          }
                        ?>                
             </select>
              </td>
          </tr>

          <tr>
            <td> Birth Date : </td>
            <td>             
                <input type="date" name="DateofBirth" required placeholder="Birth Date" >
            </td>
            <td> Joining Date : </td>
            <td>             
                 <input type="date" name="DateofJoining" required placeholder="Joining Date" >
              </td>
          </tr>
          <tr>
            <td> Address : </td>
            <td colspan="5">             
                  <input type="text" name="Address" required placeholder="Address" size="60" maxlength="100">
              </td>
            </tr>
            <tr>
            <td> City : </td>
            <td>             
                  <input type="text" name="City" required placeholder="City" size="20" maxlength="50">
              </td>
            <td> Pin : </td>
            <td>             
                  <input type="text" name="Pin" required placeholder="Pin" size="6" maxlength="10">
              </td>
          </tr>
          <tr>
            <td> State : </td>
            <td>             
                 <input type="text" name="State" required placeholder="State" size="20" maxlength="50">
            </td>
            <td> Country : </td>
            <td>             
                 <input type="text" name="Country" required placeholder="Country" size="20" maxlength="20">
              </td>
          </tr>

          <tr>
            <td> Office Mail : </td>
            <td>             
                 <input type="email" name="OfficialEmail" placeholder="Official Email" size="20" maxlength="50">
            </td>
            <td> Personal Mail : </td>
            <td>             
                 <input type="email" name="PersonalEmail" placeholder="Personal Email" size="20" maxlength="20">
            </td>
          </tr>
          <tr>
            <td> Mobile No : </td>
            <td>             
                <input type="text" name="MobileNo" required placeholder="Mobile No" size="15" maxlength="50">
            </td>
            <td> Gender : </td>
            <td>           
                  <select name="Gender">
                   <option value="Male"> Male </option>
                   <option value="Female"> Female </option>
                  </select>
            </td>
          </tr>

        </table>

       <center><button name="Submit" value ="Submit"> Save </button></center>

       </br>
      </fieldset>
      </center>
  </form>

</div>
<div class="divem1"></div> 
 <?php $this->load->view('footer.php'); ?>

</body>
</html>