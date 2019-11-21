<?php 
   session_start();
   if((isset($_SESSION["cashID"])!=true)||  empty($_SESSION["cashID"]))
    {header("Location:index.php");
      exit();}

   $cashID=$_SESSION["cashID"];
	$con=mysqli_connect("localhost","root","","cart");
if($con)
{  if(isset($_POST["record3"])){
	 
	  $query="SELECT product_id from cartoon where cash_id='$cashID' ";
	  
	  $query_run=mysqli_query($con,$query);
   	  if(mysqli_num_rows($query_run)>0){
	      $query="update product set quantity=quantity-(select quaS from cartoon where product.product_id=cartoon.product_id and cash_id='$cashID') where product.product_id=(select product_id from cartoon where product.product_id=cartoon.product_id and cash_id='$cashID')";
	       echo $query;
	     $query_run=mysqli_query($con,$query);
	     }
	 
	  else
	    echo "<script>alert('alreay added into cart')</script>";
	
	
   	
}
}

?>
