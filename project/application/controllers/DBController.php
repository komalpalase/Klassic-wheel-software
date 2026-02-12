+<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DBController extends CI_controller {

	public $host='localhost';
	public $db='proddata';
	public $user='root';
	//public $passwd='root';  //npd#$123
	public $passwd='';  
	public $port=3307;
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
    $result = mysqli_query($this->gconn, $query);

    if ($result === false) {
        die("SQL Error: " . mysqli_error($this->gconn));
    }

    $resultset = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $resultset[] = $row;
    }

    return $resultset; // empty array bhi valid hai
}

function numRows($query) {
    $result = mysqli_query($this->gconn, $query);

    if ($result === false) {
        die("SQL Error: " . mysqli_error($this->gconn));
    }

    return mysqli_num_rows($result);
}

}
?>