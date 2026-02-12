<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DBController extends CI_controller {

	public $host='localhost';
	public $db='proddata';
	public $user='root';
	public $passwd='';  //npd#$123
	public $port=3306;
	public $gconn;


	function __construct() 
	 {
		$this->gconn = $this->connectDB();
	 }
	
	function connectDB() 
	 {
		$gconn = mysqli_connect($this->host,$this->user,$this->passwd,$this->db,$this->port);

		/*		try {
				    $gconn = new PDO("mysql:host={$host};port={$port};dbname={$db}", $user, $passwd);
					} catch (PDOException $e) 
					{
				    echo 'Connection failed: ' . $e->getMessage();
					}	
		*/
			return $gconn;
	 }
	
	function runQuery($query) {
		$result = mysqli_query($this->gconn,$query);
		while($row=mysqli_fetch_assoc($result)) {
			$resultset[] = $row;
		}		
		if(!empty($resultset))
			return $resultset;
	}
	
	function numRows($query) {
		$result  = mysqli_query($this->gconn,$query);
		$rowcount = mysqli_num_rows($result);
		return $rowcount;	
	}
}
?>