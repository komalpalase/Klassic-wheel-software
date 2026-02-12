<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
      $numbers = [ 113, 115];
                     
  if (in_array($_SESSION["sDepartmentId"], $numbers))
   {
     
    } else {

         echo '<script>alert("No access allowed to you...")</script>';
          exit;
    } 
    
    $today = date('Y-m-d');
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
                height: 550px;
                width: 20%;
                float:left;
              }

         .div2{
                height: 550px;
                width: 60%;
                float:left;
                overflow-x:hidden;
                overflow-y:auto;
              }
         .div3{
                height: 550px;
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
 


  function calctottime()
  {
    var Totaltime = 0;
    var OutHH = 0;
    var OutMM = 0;
    var InHH = 0;
    var InMM = 0;
    var tottime = 0;

     OutHH = Number(document.getElementById('OutHH').value)*60;
     OutMM = Number(document.getElementById('OutMM').value);
     InHH = Number(document.getElementById('InHH').value)*60;
     InMM = Number(document.getElementById('InMM').value);
     
     tottime=((InHH+InMM)-(OutHH+OutMM));

   //  alert(tottime);

     if (tottime<0)
     {
      //  alert("Invalid Time");

       document.getElementById('Totaltime').innerText = "-";

       document.getElementById('OutHH').innerText = "00";
       document.getElementById('OutMM').innerText = "00";

       document.getElementById('InHH').innerText = "00";
       document.getElementById('InMM').innerText = "00";

        document.getElementById('Thour').innerText = 0;
        document.getElementById('Tminute').innerText = 0;

     } else
     {
          var num = tottime;
          var hours = (num / 60);
          var rhours = Math.floor(hours);
          var minutes = num - (rhours * 60);
          var rminutes = Math.round(minutes);


         Totaltime = num + " minutes = " + rhours + " hour(s) and " + rminutes + " minute(s).";

      //   alert(tottime);

     //   document.getElementById('Totaltime').innerText = Totaltime;
        document.getElementById('Thour').innerText = rhours;
        document.getElementById('Tminute').innerText = rminutes;
     }
    }

//  var $today = date('d-m-y');

</script>


</head>
<body>

<?php $this->load->view('header.php');  ?>

   <div class="divm1"><center></center> </div>
   <div class="divm2"><a href="Gatepass"><img border="0" alt="Back" src="\Gatepass\Assets\Icon\Back.jpg" width="25" height="25" title="Back"></a></div>

    <div class="div1"> </div>
    <div class="div2">
    <form  action="Edit_Gatepass" method="POST" enctype="multipart/form-data">

     <fieldset style= "border: 1px solid">
       <legend><h5> Edit Gatepass </h5></legend> 
        <center>
        <span>&nbsp; Gatepass Id :&nbsp;&nbsp;&nbsp;</span>
        <input type="text" name="GatepassId" required readonly value="
          <?php echo $_POST['GatepassId']; ?>"> 

                </center>

          <?php
             // $DepartmentId=0;

              $host='localhost';
              $db='training';
              $user='root';
              $passwd='root';  //npd#$123
              $port=3307;
              $gconn = new PDO("mysql:host={$host};port={$port};dbname={$db}", $user, $passwd);   

              $query = "SELECT * from v_gatepass where GatepassId=".$_POST['GatepassId'] ;

     //         $db_handle = new DBController();
    //          $results = $db_handle->runQuery($query);

              $statement = $gconn->prepare($query);
              $statement->execute();                               
              $results = $statement->fetch(PDO::FETCH_ASSOC);
              
            ?>


            </br>

            <table align="center" >
                <tr>
                    <td> Gatepass No : </td>
                    <td><input type="text" name="Gatepassno" maxlength="10" required value='<?php echo $results['gatepassno']; ?>'></td>
                </tr>
                <tr>
                    <td> Date :</td>
                    <td><input type="date" name="Gatepassdate" required value='<?php echo $results['gatepassdate']; ?>' ></td>
                </tr>

            <td> Employee Code : </td>

            <td>  <select name="EmployeeCode" required onchange="showEmp(this.value)">
                     <?php
                    //  require_once("DBController.php");
                      $db_handle = new DBController();

                          $query = "SELECT * FROM Employee Where Companyid=".$_SESSION["sCompanyId"]." and EmployeeCode='".$results['EmployeeCode']."' order by EmployeeName";                  

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
                           <?php echo $row['EmployeeName']." [ ".$row['EmployeeCode']." ] " ?>
                          </option>

                      <?php
                        }
                      ?>               
              </select> 
              <br>
              <span id="EmployeeCode"></span> 
            </td>


                <tr><td>Shift:</td>
                <i class="fa-solid fa-business-time"></i></td>
                <td><select name="Shift" required value='<?php echo $results['shift']; ?>' >
                        <option value="First"> First </option>
                        <option value="Second"> Second </option>
                        <option value="Third"> Third </option>
                        <option value="General I">General I </option>
                        <option value="General II">General II </option>
                        <option value="General III">General III </option>
                        <option value="Night"> Night </option></select></td>
                    </tr>

                 <tr>
                <td>Reason of Leaving:</td>
                  <td>
                        <select name="Gptype" required value='<?php echo $results['gptype']; ?>'>
                        <option value="Personal"> Personal </option>
                        <option value="Official"> Official </option>
                  </td>
                </tr>
                <tr>
                 <td> Vehicle : </td>
                 <td> <input type="text" name="Vehicle" maxlength="12" required value='<?php echo $results['vehicle']; ?>'> </td>
                </tr>
                <tr>
                 <td> Out time: </td>
                 <td><input type="text" id="OutHH" name="OutHH" title ="Enter in 24 Hour format" required placeholder="HH" size="2" maxlength="2" min="0" max="24" onclick="calctottime(this.value)" value='<?php echo $results['outhh']; ?>'>
                      <input type="text" id="OutMM" name="OutMM" title="Enter Minutes" required placeholder="MM" size="2" maxlength="2" min="0" max="60" onclick="calctottime(this.value)" value='<?php echo $results['outmm']; ?>'>
                    </td>
                </tr>                
                <tr>
                 <td> In Time : </td>
                 <td> <input type="text" id="InHH" name="InHH" title ="Enter in 24 Hour format" required placeholder="HH" size="2" maxlength="2" min="0" max="24" onclick="calctottime(this.value)" value='<?php echo $results['inhh']; ?>'>
                      <input type="text" id="InMM" name="InMM" title="Enter Minutes" required placeholder="MM" size="2" maxlength="2" min="0" max="60" onclick="calctottime(this.value)" value='<?php echo $results['inmm']; ?>'>
                   </td>
                 </tr>
                <tr>
                 <td> Total Time : </td>
                 <td>               
                      Hours : <span id="Thour" name="Thour"> </span> 
                      Minute : <span id="Tminute" name="Tminute"> </span> 
                 </td>

                </tr>                 
                </tr>                
                <tr>
                  <td>Reason for Leaving : </td>
                  <td> <input type="text" name="Leavereason" maxlength="100" size="40" required value='<?php echo $results['leavereason']; ?>'></td>
                </tr>

                <tr>
                  <td>Location Where Going : &nbsp;</td>
                  <td><input type="text" name="Location" maxlength="100" size="40" required value='<?php echo $results['location']; ?>'></td>
                </tr>
                <tr>
                  <td>KM Travelled : &nbsp;</td>
                  <td><input type="text" name="Kilometer" title ="Enter KM Travelled" required placeholder="KM Travelled" size="4" maxlength="4" min="0" max="9999" value='<?php echo $results['kilometer']; ?>' ></td>
                </tr>   
            </table>


        </br></br>

        <center> <input type="Reset" value="Reset"> <input type="Submit" name="Submit" value="Save"> </center>     
         

       </br></br>
     </fieldset>

    </form>

  </div>
  <div class="div1"> </div>
 <?php $this->load->view('footer.php'); ?>

</body>
</html>


