<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to Gatepass </title>
		<style type="text/css">
			
				body{
				font-size: 16px;  
				font-family: Times Roman New;*/
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
            .divc1{
            	height: 540px;
            	width: 45%;
            	float:left;
                }
            .divc2{
            	height: 540px;
            	width: 55%;
            	float:left;
              overflow-x:hidden;
              overflow-y:auto;
                }

          .table{
                 overflow-x:hidden;
                 overflow-y:auto; 
                 height: 300px; 
                 width: 100%;          
                }

           .div{overflow-x: auto;}

		</style>
    <script type="text/javascript">
      document.addEventListener("keydown", function (event){
          if (event.ctrlKey)
            {       event.preventDefault();    }
          if(event.keyCode == 123)
            {       event.preventDefault();    }});

      document.addEventListener('contextmenu', 
         event => event.preventDefault()
        );
    </script>
</head>
<body>

<?php $this->load->view('header.php');  ?>


   <div class="divc2"> 
     </br>

     <fieldset> 
       <legend><h5> Company List </h5></legend> 
   

        <table border="1px">

              <tr>
                 <td>
                   Company Id
                 </td>
                 <td>
                   Company Name
                 </td>
                 
               </tr>

          <?php

              $query = "SELECT * FROM CompanyMaster order by CompanyId";

              $db_handle = new DBController();

              $result = $db_handle->runQuery($query);
             
              foreach ($result as $row) 
              {
            ?>

              <tr>
                 <td>
                   <?php echo $row['CompanyId'];?>
                 </td>
                 <td>
                   <?php echo $row['CompanyName'];?>
                 </td>
               </tr>
       


            <?php
              }
            ?>              
         </table>
     </fieldset>

   </div>
    <div class="divc1">
      <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
     <a href="Master"><img border="0" alt="Back" src="\Gatepass\Assets\Icon\Back.jpg" width="25" height="25" title="Back"></a>

    <form  action="Save_Company" method="POST" enctype="multipart/form-data">
     <fieldset> 
       <legend><h5> New Company </h5></legend> 
        <span>&nbsp; Company Id :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
        <input type="text" name="CompanyId" required readonly value="
          <?php
              $Companyid=101;
			
              $host='localhost';
              $db='training';
              $user='root';
              $passwd='root';  //npd#$123
              $port=3307;
              $gconn = new PDO("mysql:host={$host};port={$port};dbname={$db}", $user, $passwd);   

              $query = "SELECT max(Companyid) as Companyid from CompanyMaster" ;

     //         $db_handle = new DBController();
    //          $results = $db_handle->runQuery($query);

              $statement = $gconn->prepare($query);
              $statement->execute();                               
              $results = $statement->fetch(PDO::FETCH_ASSOC);

              if ($results)
               {
                If ($results['Companyid']==0)
                {echo ($Companyid);}
                 else
                 { $Companyid=$results['Companyid']+1;
                 echo (trim($Companyid));
                 }
               }
                 else
                 {echo $Companyid;}
                ?>"> 

        </br></br>

        <span>&nbsp; Company Name :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> 
        <input type="text" name="CompanyName" required placeholder="Company Name" size="60" maxlength="100">
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
