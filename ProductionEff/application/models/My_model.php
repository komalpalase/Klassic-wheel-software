<?php

class My_model extends CI_model {

	Public function Save_Company_model(){
	  //     echo '<pre>';
  	  //     print_r($_POST);

	  if ($_POST['Submit']='Submit')
       {
          $CompanyId=$_POST['CompanyId'];
          $CompanyName=$_POST['CompanyName'];

          $sUserId=$_SESSION["sUserId"];
          $sCompanyId=$_SESSION["sCompanyId"];
	 	      $sSiteId=$_SESSION["sSiteId"];

              $host='localhost';
              $db='training';
              $user='root';
              $passwd='root';  //npd#$123
              $port=3307;
              $gconn = new PDO("mysql:host={$host};port={$port};dbname={$db}", $user, $passwd); 


		        $sql = 'INSERT INTO companymaster(CompanyId,CompanyName) 
		        VALUES(:CompanyId,:CompanyName)';

		        $statement = $gconn->prepare($sql);

		        $statement->execute([
		            ':CompanyId' => $CompanyId,
		            ':CompanyName' => $CompanyName]);
         
         echo '<script>alert("The Company : ' . trim($CompanyName ). ' is Inserted Successfully...")</script>';
				   
         return true;
       } else 
	    {return false;}

	}

	Public function Save_Site_model(){
	  //     echo '<pre>';
  	  //     print_r($_POST);

	  if ($_POST['Submit']='Submit')
       {
          $SiteId=$_POST['SiteId'];
          $SiteName=$_POST['SiteName'];

          $sUserId=$_SESSION["sUserId"];
          $sCompanyId=$_SESSION["sCompanyId"];
	 	      $sSiteId=$_SESSION["sSiteId"];

              $host='localhost';
              $db='training';
              $user='root';
              $passwd='root';  //npd#$123
              $port=3307;
              $gconn = new PDO("mysql:host={$host};port={$port};dbname={$db}", $user, $passwd); 

		        $sql = 'INSERT INTO SiteMaster(SiteId,SiteName) 
		        VALUES(:SiteId,:SiteName)';

		        $statement = $gconn->prepare($sql);

		        $statement->execute([
		            ':SiteId' => $SiteId,
		            ':SiteName' => $SiteName]);
         
         echo '<script>alert("The Site : ' . trim($SiteName ). ' is Inserted Successfully...")</script>';
				   
         return true;
       } else 
	    {return false;}

	}

  Public function Save_Dept_model(){
    //     echo '<pre>';
      //     print_r($_POST);

    if ($_POST['Submit']='Submit')
       {
          $DepartmentId=$_POST['DepartmentId'];
          $DepartmentName=$_POST['DepartmentName'];

          $sUserId=$_SESSION["sUserId"];
          $sCompanyId=$_SESSION["sCompanyId"];
          $sSiteId=$_SESSION["sSiteId"];

              $host='localhost';
              $db='training';
              $user='root';
              $passwd='root';  //npd#$123
              $port=3307;
              $gconn = new PDO("mysql:host={$host};port={$port};dbname={$db}", $user, $passwd); 

            $sql = 'INSERT INTO DeptMaster(DepartmentId,DepartmentName) 
            VALUES(:DepartmentId,:DepartmentName)';

            $statement = $gconn->prepare($sql);

            $statement->execute([
                ':DepartmentId' => $DepartmentId,
                ':DepartmentName' => $DepartmentName]);
         
         echo '<script>alert("The Department : ' . trim($DepartmentName ). ' is Inserted Successfully...")</script>';
           
         return true;
       } else 
      {return false;}

  }


  Public function Save_Desg_model(){
    //     echo '<pre>';
      //     print_r($_POST);

    if ($_POST['Submit']='Submit')
       {
          $DesignationId=$_POST['DesignationId'];
          $Designation=$_POST['Designation'];

          $sUserId=$_SESSION["sUserId"];
          $sCompanyId=$_SESSION["sCompanyId"];
          $sSiteId=$_SESSION["sSiteId"];

              $host='localhost';
              $db='training';
              $user='root';
              $passwd='root';  //npd#$123
              $port=3307;
              $gconn = new PDO("mysql:host={$host};port={$port};dbname={$db}", $user, $passwd); 

            $sql = 'INSERT INTO DesgMaster(DesignationId,Designation) 
            VALUES(:DesignationId,:Designation)';

            $statement = $gconn->prepare($sql);

            $statement->execute([
                ':DesignationId' => $DesignationId,
                ':Designation' => $Designation]);
         
         echo '<script>alert("The Designation : ' . trim($Designation ). ' is Inserted Successfully...")</script>';
           
         return true;
       } else 
      {return false;}

  }


  

  Public function Save_Employee_model(){
      //   echo '<pre>';
      //   print_r($_POST);

    if ($_POST['Submit']='Submit')
       {
          $EmployeeCode=$_POST['EmployeeCode'];
          $EmployeeName=$_POST['EmployeeName'];
          $EmploymentType=$_POST['EmploymentType'];
          $UserType=$_POST['UserType'];
          $CompanyId=$_POST['CompanyId'];
          $SiteId=$_POST['SiteId'];
          $DepartmentId=$_POST['DepartmentId'];
          $DesignationId=$_POST['DesignationId'];
          $DateofBirth=$_POST['DateofBirth'];
          $DateofJoining=$_POST['DateofJoining'];
          $Address=$_POST['Address'];
          $City=$_POST['City'];
          $Pin=$_POST['Pin'];
          $State=$_POST['State'];
          $Country=$_POST['Country'];
          $OfficialEmail=$_POST['OfficialEmail'];
          $PersonalEmail=$_POST['PersonalEmail'];
          $MobileNo=$_POST['MobileNo'];
          $Gender=$_POST['Gender'];


          $sUserId=$_SESSION["sUserId"];
          $sCompanyId=$_SESSION["sCompanyId"];
          $sSiteId=$_SESSION["sSiteId"];

            $host='localhost';
            $db='training';
            $user='root';
            $passwd='root';  //npd#$123
            $port=3307;
            $gconn = new PDO("mysql:host={$host};port={$port};dbname={$db}", $user, $passwd); 

            $sql = 'INSERT INTO EmployeeMaster(EmployeeCode,EmployeeName,EmploymentType,UserType,CompanyId,SiteId,DepartmentId,DesignationId,DateofBirth,DateofJoining,PresentAddress,PresentCity,PresentPinCode,PresentState,PresentCountry,OfficialEmail,PersonalEmail,MobileNo,Gender) 
            VALUES(:EmployeeCode,:EmployeeName,:EmploymentType,:UserType,:CompanyId,:SiteId,:DepartmentId,:DesignationId,:DateofBirth,:DateofJoining,:Address,:City,:Pin,:State,:Country,:OfficialEmail,:PersonalEmail,:MobileNo,:Gender)';

            $statement = $gconn->prepare($sql);

            $statement->execute([
                ':EmployeeCode' => $EmployeeCode,
                ':EmployeeName' => $EmployeeName,
                ':EmploymentType' => $EmploymentType,
                ':UserType' => $UserType,
                ':CompanyId' => $CompanyId,
                ':SiteId' => $SiteId,
                ':DepartmentId' => $DepartmentId,
                ':DesignationId' => $DesignationId,
                ':DateofBirth' => $DateofBirth,
                ':DateofJoining' => $DateofJoining,
                ':Address' => $Address,
                ':City' => $City,
                ':Pin' => $Pin,
                ':State' => $State,
                ':Country' => $Country,
                ':OfficialEmail' => $OfficialEmail,
                ':PersonalEmail' => $PersonalEmail,
                ':MobileNo' => $MobileNo,
                ':Gender' => $Gender]);
         
         echo '<script>alert("The Employee Name : '.trim($EmployeeName).' is Inserted Successfully...")</script>';
         return true;
       } else 
      {return false;}

  }


  Public function Save_gatepass()
  {
       //  echo '<pre>';
       //  print_r($_POST);
       //  return;

    if ($_POST['Submit']='Save')
       {
              $sUserId = $_SESSION["sUserId"];
              $CompanyId = $_SESSION["sCompanyId"];
              $SiteId = $_SESSION["sSiteId"];

         //     $GatepassId = $_SESSION["GatepassId"];

              $Gatepassno = $_POST["Gatepassno"];
              $Gatepassdate = $_POST["Gatepassdate"];
              $EmployeeCode = $_POST["EmployeeCode"];
              $Shift = $_POST["Shift"];
              $Gptype = $_POST["Gptype"];
              $Vehicle = $_POST["Vehicle"];
              $OutHH = $_POST["OutHH"];
              $OutMM = $_POST["OutMM"];
              $InHH = $_POST["InHH"];
              $InMM = $_POST["InMM"];
              $Leavereason = $_POST["Leavereason"];
              $Location = $_POST["Location"];
              $Kilometer = $_POST["Kilometer"];
  
              $tottime=(($InHH*60)+$InMM)-(($OutHH*60)+$OutMM);

              $num = 0;
              $hours = 0;
              $rhours = 0;
              $minutes = 0;
              $rminutes = 0;

              $num = $tottime;
              $hours = ($num / 60);
              $rhours = floor($hours);
              $minutes = $num - ($rhours * 60);
              $TotHH = $rhours;
              $TotMM = round($minutes);
               
        try {

              $host='localhost';
              $db='training';
              $user='root';
              $passwd='root';  //npd#$123
              $port=3307;
              $gconn = new PDO("mysql:host={$host};port={$port};dbname={$db}", $user, $passwd); 

              $query = "SELECT max(GatepassId) as GatepassId from Gatepass";

              $statement = $gconn->prepare($query);
              $statement->execute();                               
              $results = $statement->fetch(PDO::FETCH_ASSOC);

              if ($results)
               {
                 $GatepassId=$results['GatepassId']+1;
               }
                else
               {
                 $GatepassId=1;
               } 
               

            $sql = 'INSERT INTO Gatepass(CompanyId,SiteId,GatepassId,Gatepassno,Gatepassdate,EmployeeCode,Shift,Gptype,Vehicle,OutHH,OutMM,InHH,InMM,TotHH,TotMM,Leavereason,Location,Kilometer,UserId) 
            VALUES(:CompanyId,:SiteId,:GatepassId,:Gatepassno,:Gatepassdate,:EmployeeCode,:Shift,:Gptype,:Vehicle,:OutHH,:OutMM,:InHH,:InMM,:TotHH,:TotMM,:Leavereason,:Location,:Kilometer,:UserId)';

            $statement = $gconn->prepare($sql);

            $statement->execute([
                ':CompanyId' => $CompanyId,
                ':SiteId' => $SiteId,
                ':GatepassId' => $GatepassId,
                ':Gatepassno' => $Gatepassno,
                ':Gatepassdate' => $Gatepassdate,
                ':EmployeeCode' => $EmployeeCode,
                ':Shift' => $Shift,
                ':Gptype' => $Gptype,
                ':Vehicle' => $Vehicle,
                ':OutHH' => $OutHH,
                ':OutMM' => $OutMM,
                ':InHH' => $InHH,
                ':InMM' => $InMM,
                ':TotHH' => $TotHH,
                ':TotMM' => $TotMM,
                ':Leavereason' => $Leavereason,
                ':Location' => $Location,
                ':Kilometer' => $Kilometer,
                ':UserId' => $sUserId]);
         
         echo '<script>alert("The Gatepass No : ' . trim($Gatepassno). ' is Inserted Successfully...")</script>';
           

         return true;

          } catch (Exception $e) {
              // Handle the exception
           //   echo "Caught exception: " . $e->getMessage();
          //  $_POST['Submit']='';
         //   echo '<script>alert("Invalid Data for Gatepass No.: '.$_POST['Submit'].' ...")</script>';
          }

          

       } 

    }


  Public function Edit_gatepass()
  {
       //  echo '<pre>';
       //  print_r($_POST);
       //  return;

    if ($_POST['Submit']='Save' && isset($_POST['Submit']))
       {
              $sUserId = $_SESSION["sUserId"];
              $CompanyId = $_SESSION["sCompanyId"];
              $SiteId = $_SESSION["sSiteId"];

              $GatepassId = $_POST["GatepassId"];

              $Gatepassno = $_POST["Gatepassno"];
              $Gatepassdate = $_POST["Gatepassdate"];
              $EmployeeCode = $_POST["EmployeeCode"];
              $Shift = $_POST["Shift"];
              $Gptype = $_POST["Gptype"];
              $Vehicle = $_POST["Vehicle"];
              $OutHH = $_POST["OutHH"];
              $OutMM = $_POST["OutMM"];
              $InHH = $_POST["InHH"];
              $InMM = $_POST["InMM"];
              $Leavereason = $_POST["Leavereason"];
              $Location = $_POST["Location"];
              $Kilometer = $_POST["Kilometer"];
  
              $tottime=(($InHH*60)+$InMM)-(($OutHH*60)+$OutMM);

              $num = 0;
              $hours = 0;
              $rhours = 0;
              $minutes = 0;
              $rminutes = 0;

              $num = $tottime;
              $hours = ($num / 60);
              $rhours = floor($hours);
              $minutes = $num - ($rhours * 60);
              $TotHH = $rhours;
              $TotMM = round($minutes);
               
        try {

              $host='localhost';
              $db='training';
              $user='root';
              $passwd='root';  //npd#$123
              $port=3307;
              $gconn = new PDO("mysql:host={$host};port={$port};dbname={$db}", $user, $passwd); 

                $deluserid = $_SESSION["sUserId"];  // Example user ID (could be from session or user input)
                $mGatepassId = $GatepassId;  // ID of the record to be deleted

                // Call the stored procedure to delete the record and log it
                $stmt = $gconn->prepare("CALL update_gatepass(:GatepassId, :deluserid)");
                $stmt->bindParam(':GatepassId', $mGatepassId);
                $stmt->bindParam(':deluserid', $deluserid);

                // Execute the statement
                $stmt->execute();

              $sql = "UPDATE gatepass SET Gatepassno = :Gatepassno,
              Gatepassdate = :Gatepassdate,
              EmployeeCode = :EmployeeCode,
              Shift = :Shift,
              Gptype = :Gptype,
              Vehicle = :Vehicle,
              OutHH = :OutHH,
              OutMM = :OutMM,
              InHH = :InHH,
              InMM = :InMM,
              TotHH = :TotHH,
              TotMM = :TotMM,
              Leavereason = :Leavereason,
              Location = :Location,
              Kilometer = :Kilometer,
              UserId = :UserId
              WHERE GatepassId = :GatepassId";
              // Prepare the SQL statement
              $stmt = $gconn->prepare($sql);
              // Bind the values to the placeholders
              $stmt->bindParam(':Gatepassno', $Gatepassno, PDO::PARAM_INT);
              $stmt->bindParam(':Gatepassdate',$Gatepassdate, PDO::PARAM_STR);
              $stmt->bindParam(':EmployeeCode', $EmployeeCode, PDO::PARAM_STR); 
              $stmt->bindParam(':Shift', $Shift, PDO::PARAM_STR);
              $stmt->bindParam(':Gptype', $Gptype, PDO::PARAM_STR);
              $stmt->bindParam(':Vehicle', $Vehicle, PDO::PARAM_STR);
              $stmt->bindParam(':OutHH', $OutHH, PDO::PARAM_INT);
              $stmt->bindParam(':OutMM', $OutMM, PDO::PARAM_INT);
              $stmt->bindParam(':InHH', $OutHH, PDO::PARAM_INT);
              $stmt->bindParam(':InMM', $OutMM, PDO::PARAM_INT);
              $stmt->bindParam(':TotHH', $TotHH, PDO::PARAM_INT);
              $stmt->bindParam(':TotMM', $TotMM, PDO::PARAM_INT);
              $stmt->bindParam(':Leavereason', $Leavereason, PDO::PARAM_STR);              
              $stmt->bindParam(':Location', $Location, PDO::PARAM_STR);
              $stmt->bindParam(':Kilometer', $Kilometer, PDO::PARAM_INT);
              $stmt->bindParam(':UserId', $sUserId, PDO::PARAM_STR);
              $stmt->bindParam(':GatepassId', $GatepassId, PDO::PARAM_INT);
              // Execute the query
              $stmt->execute();

         
         echo '<script>alert("The Gatepass No : ' . trim($Gatepassno). ' is Updated Successfully...")</script>';
           

         return true;

          } catch (Exception $e) {
              // Handle the exception
           //   echo "Caught exception: " . $e->getMessage();
          //  $_POST['Submit']='';
         //   echo '<script>alert("Invalid Data for Gatepass No.: '.$_POST['Submit'].' ...")</script>';
          }
        } 
    }


  








}
?>
