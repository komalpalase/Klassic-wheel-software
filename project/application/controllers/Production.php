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

public function LoginUser()
{
    session_start();

    $Username = $_POST['UserId'];
    $Password = $_POST['Password'];

    $query = "SELECT e.*, 
                     c.CompanyName, 
                     s.SiteName, 
                     d.Designation,
                     dp.DepartmentName
              FROM employeemaster e
              LEFT JOIN companymaster c 
                     ON e.CompanyId = c.CompanyId
              LEFT JOIN sitemaster s 
                     ON e.SiteId = s.SiteId
              LEFT JOIN desgmaster d 
                     ON e.DesignationId = d.DesignationId
              LEFT JOIN deptmaster dp 
                     ON e.DepartmentId = dp.DepartmentId
              WHERE e.EmployeeCode='$Username' 
              AND e.Password='$Password'";

    $db_handle = new DBController();
    $employeemast = $db_handle->runQuery($query);

    if ($employeemast)
    {
        $employeemaster = $employeemast[0];

        // 🔐 Only Admin Can Login
        if($employeemaster['UserType'] == 'admin')
        {
            $_SESSION["sEmployeeCode"]   = $employeemaster['EmployeeCode'];
            $_SESSION["sEmployeeName"]   = $employeemaster['EmployeeName'];
            $_SESSION["sUserId"]         = $employeemaster['EmployeeCode'];
            $_SESSION["sUserName"]       = $employeemaster['EmployeeName'];
            $_SESSION["sUserType"]       = $employeemaster['UserType'];
            $_SESSION["sDepartmentId"]   = $employeemaster['DepartmentId'];
            $_SESSION["sDepartmentName"] = $employeemaster['DepartmentName'];
            $_SESSION["sDesignationId"]  = $employeemaster['DesignationId'];
            $_SESSION["sDesignation"]    = $employeemaster['Designation'];
            $_SESSION["sCompanyId"]      = $employeemaster['CompanyId'];
            $_SESSION["sCompanyName"]    = $employeemaster['CompanyName'];
            $_SESSION["sSiteId"]         = $employeemaster['SiteId'];
            $_SESSION["sSiteName"]       = $employeemaster['SiteName'];

            // ✅ Redirect (Fixes ERR_CACHE_MISS)
            redirect('MainMenu');
        }
        else
        {
            echo '<script>alert("Access Denied! Only Admin Can Login.")</script>';
            $this->load->view('Login.php');
        }
    }
    else
    {
        echo '<script>alert("Username and Password not matching...")</script>';
        $this->load->view('Login.php');
    }
}


    Public function MainMenu()
	 {
		$this->load->view('MainMenu.php');
	 } 

	Public function master()
	 {
		$this->load->view('master.php');
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

	public function AddEmployees()
	{
    $db_handle = new DBController();

    $data['Company'] = $db_handle->runQuery("SELECT CompanyId, CompanyName FROM CompanyMaster");
    $data['Site'] = $db_handle->runQuery("SELECT SiteId, SiteName FROM SiteMaster");
    $data['Department'] = $db_handle->runQuery("SELECT DepartmentId, DepartmentName FROM Deptmaster");
    $data['Designation'] = $db_handle->runQuery("SELECT DesignationId, Designation FROM Desgmaster");

    $this->load->view('AddEmployees', $data);
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
