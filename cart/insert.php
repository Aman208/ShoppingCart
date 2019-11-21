<?php
  session_start();
 if((isset($_SESSION["cashID"])!=true)||  empty($_SESSION["cashID"]))
    {header("Location:index.php");
      exit();}

 $cashID=$_SESSION["cashID"];


	$con=mysqli_connect("localhost","root","","cart");
if($con)
{  if(isset($_POST["id"])&&isset($_POST["quantity"])){
	  $id=$_POST["id"];
	  $quantity=$_POST["quantity"];

	  $query="SELECT product_id from cartoon where product_id='$id' and cash_id='$cashID' ";
	  $query_run=mysqli_query($con,$query);
   	  if(mysqli_num_rows($query_run)==0){
	      $query="INSERT INTO cartoon (cash_id,product_id,quaS) values('$cashID','$id','$quantity')";
	       echo $query;
	     $query_run=mysqli_query($con,$query);
	     }

	  else
	    echo "<script>alert('alreay added into cart')</script>";



}
}

?>
