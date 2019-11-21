<?php 
 session_start();
if((isset($_SESSION["cashID"])!=true)||  empty($_SESSION["cashID"]))
    {header("Location:index.php");
      exit();}

  $cashID=$_SESSION["cashID"];
	$con=mysqli_connect("localhost","root","","cart");
if($con)
{  if(isset($_POST["record1"])){
	
	  $query="DELETE from cartoon where cash_id='$cashID'";
	  $query_run=mysqli_query($con,$query);
   	  
}
}

?>
