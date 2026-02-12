<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
 require_once("DBController.php");
 $db_handle = new DBController();

if(!isset($_SESSION)) 
 { 
  session_start(); 
 }


class Production extends CI_Controller 
 {

	Public  function __construct()
     {
	    parent::__construct();

		$this->susername = "-";
		$this->susertype = "-";
		$this->sempid = "-";
		$this->suserid = "-";
     }

	Public function get_name() 
	 {
		return $this->susername;
		return $this->susertype;
		return $this->sempid;
		return $this->suserid;
	 }

	Public function index()
	 {
		$this->load->view('Login');
	 }
	Public function backpg()
	 {
		$this->load->view('MainMenu.php');
	 }

	// Public function LoginUser()
	//  {

	// 	 //       echo '<pre>';
	//   	 //       print_r($_POST);
	//   	  //      print_r($_FILES);

	// 		$Username = $_POST['UserId'];
  	//         $Password = $_POST['Password'];
 
	// 		 $query = "SELECT * FROM employee where EmployeeCode ='$Username' and Employeecode='$Password'";

	// 		$db_handle = new DBController();

	//         $employeemast = $db_handle->runQuery($query);

	// 		if ($employeemast)
	// 		 {
	// 			// echo $usermaster['UserId'] . '. ' . $usermaster['UserName'];


	// 			foreach($employeemast as $employeemaster)
	// 			{

	// 		    	$_SESSION["sEmployeeCode"] = $employeemaster['EmployeeCode'];
	// 		    	$_SESSION["sEmployeeName"] = $employeemaster['EmployeeName'];
	// 		    	$_SESSION["sUserId"] = $employeemaster['EmployeeCode'];
	// 		    	$_SESSION["sUserName"] = $employeemaster['EmployeeName'];
	// 		    	$_SESSION["sUserType"] = $employeemaster['UserType'];
	// 		    	$_SESSION["sDepartmentId"] = $employeemaster['DepartmentId'];
	// 		    	$_SESSION["sDepartmentName"] = $employeemaster['DepartmentName'];	
	// 		    	$_SESSION["sDesignationId"] = $employeemaster['DesignationId'];
	// 		    	$_SESSION["sDesignation"] = $employeemaster['Designation'];				    				    	  
	// 		    	$_SESSION["sCompanyId"] = $employeemaster['CompanyId'];
	// 		    	$_SESSION["sCompanyName"] = $employeemaster['CompanyName'];
	// 		    	$_SESSION["sSiteId"] = $employeemaster['SiteId'];
	// 		    	$_SESSION["sSiteName"] = $employeemaster['SiteName'];

	// 		    	$sUserName = $employeemaster['EmployeeName'];
	// 		    	$sUserType = $employeemaster['UserType'];
	// 		    	$sEmployeeCode = $employeemaster['EmployeeCode'];
	// 		    	$sUserId = $employeemaster['EmployeeCode'];			    	  
	// 			}
			    	
	// 		        $this->load->view('MainMenu.php');
	// 		 } else
	// 			{
	// 				echo '<script>alert("Username and Password not matching...")</script>';
	// 				$this->load->view('Login.php');
	// 			}
   	//  }
	public function LoginUser()
{
    $Username = $_POST['UserName'];
    $Password = $_POST['Password'];

    // Updated query using user_master columns
    $query = "SELECT * FROM usermaster WHERE UserName ='$Username' AND Password='$Password' AND Active=1";

    $db_handle = new DBController();

    $usermast = $db_handle->runQuery($query);

    if ($usermast)
    {
        foreach($usermast as $usermaster)
        {
            $_SESSION["sUserId"] = $usermaster['UserId'];
            $_SESSION["sUserName"] = $usermaster['UserName'];
            $_SESSION["sUserType"] = $usermaster['UserType'];
            $_SESSION["sContactNo"] = $usermaster['ContactNo'];
            $_SESSION["sEmailId"] = $usermaster['EmailId'];
            $_SESSION["sSite"] = $usermaster['Site'];
			$_SESSION["sContactNo"] = $employeemaster['ContactNo'];
        }
        
        $this->load->view('MainMenu.php');
    } 
    else
    {
        echo '<script>alert("Username and Password not matching or user inactive...")</script>';
        $this->load->view('Login.php');
    }
}


    Public function MainMenu()
	 {
		$this->load->view('MainMenu.php');
	 } 

	Public function master()
	 {
		$this->load->view('Master.php');
	 }

	Public function Transaction()
	 {
		$this->load->view('Transaction.php');
	 }

	Public function company()
	 {
		$this->load->view('Company.php');
	 }

	Public function Save_Company()
	 {
		$this->load->model('My_model');
		$res = $this->My_model->Save_Company_model($_POST);
		if($res)
		{
		//	echo 'Visitor Registed';
		}else{
		//	echo '<script>alert("The Visitor Out Entry not inserted")</script>';
		}
		$this->load->view('Company.php');	
	 }
	 
	Public function Site()
	 {
		$this->load->view('Site.php');
	 }

	Public function Save_Site()
	 {
		$this->load->model('My_model');
		$res = $this->My_model->Save_Site_model($_POST);
		if($res)
		{
		//	echo 'Visitor Registed';
		}else{
		//	echo '<script>alert("The Visitor Out Entry not inserted")</script>';
		}
		$this->load->view('Site.php');	
	 }

	Public function Department()
	 {
		$this->load->view('Department.php');
	 }

	Public function Save_Dept()
	 {
		$this->load->model('My_model');
		$res = $this->My_model->Save_Dept_model($_POST);
		if($res)
		{
		//	echo 'Visitor Registed';
		}else{
		//	echo '<script>alert("The Visitor Out Entry not inserted")</script>';
		}
		$this->load->view('Department.php');	
	 }

	Public function Designation()
	 {
		$this->load->view('Designation.php');
	 }

	Public function Save_Desg()
	 {
		$this->load->model('My_model');
		$res = $this->My_model->Save_Desg_model($_POST);
		if($res)
		{
		//	echo 'Visitor Registed';
		}else{
		//	echo '<script>alert("The Visitor Out Entry not inserted")</script>';
		}
		$this->load->view('Designation.php');	
	 }

	Public function Trainer()
	 {
		$this->load->view('Trainer.php');
	 }



	Public function Employee()
	 {
		$this->load->view('Employee.php');
	 }

    Public function AddEmployees()
	 {
		$this->load->view('AddEmployees.php');
	 } 

	Public function Save_Employee()
	 {
		$this->load->model('My_model');
		$res = $this->My_model->Save_Employee_model($_POST);
		if($res)
		{
		//	echo 'Visitor Registed';
		}else{
		//	echo '<script>alert("The Visitor Out Entry not inserted")</script>';
		}
		$this->load->view('AddEmployees.php');
     }
    Public function Gatepass()
	 {
		$this->load->view('gatepass.php');
	 } 
 
     Public function Addgatepass()
	 {
		$this->load->view('Addgatepass.php');
	 } 
 
	Public function Save_gatepass()
	 {
		$this->load->model('My_model');
		$res = $this->My_model->Save_gatepass($_POST);
		if($res)
		{
		//	echo 'Visitor Registed';
		}else{
		//	echo '<script>alert("The Visitor Out Entry not inserted")</script>';
		}
		$this->load->view('Addgatepass.php');
     }

     Public function Editgatepass()
	 {
		$this->load->view('Editgatepass.php');
	 } 



	Public function Edit_Gatepass()
	 {
		$this->load->model('My_model');
		$res = $this->My_model->Edit_Gatepass($_POST);
		if($res)
		{
		 // echo '<script>alert("The Gatepass No : ' . trim($Gatepassno). ' is Updated Successfully...")</script>';
		  $_POST = array(); 
		}else{
		//	echo '<script>alert("The Visitor Out Entry not inserted")</script>';
		}
		
		$this->load->view('gatepass.php');
     }


     Public function Rpts()
	 {
		$this->load->view('Rpts.php');
	 } 

     Public function Rpts001()
	 {
		$this->load->view('Rpts001.php');
	 } 


	 














 }


?>
