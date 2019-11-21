<?php 
  session_start();
 if((isset($_SESSION["cashID"])!=true)||  empty($_SESSION["cashID"]))
    {header("Location:index.php");
      exit();}

  $cashID=$_SESSION["cashID"];
	$con=mysqli_connect("localhost","root","","cart");
if($con)
{  if(isset($_POST["id"])){
	$id=$_POST["id"];
	  $query="DELETE from cartoon where product_id='$id' and cash_id='$cashID' ";
	  $query_run=mysqli_query($con,$query);
   	  
}
}

?>
