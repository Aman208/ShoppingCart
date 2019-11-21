
<?php 
 session_start();
 if((isset($_SESSION["cashID"])!=true)||  empty($_SESSION["cashID"]))
    {header("Location:index.php");
      exit();}

 $cashID=$_SESSION["cashID"];
 
?>


<table class="table table-striped table-bordered">
    <thead>
      <tr>
	    <th>NAME</th>
        <th>Unit_Price</th>
		<th>Quantity</th>
		<th>Discount</th>
        
		
		<th>Total_Price</th>
      </tr>
    </thead>
    <tbody>
	<?php 
	$con=mysqli_connect("localhost","root","","cart");
if($con)
{ 

if(isset($_POST["record"])){
$query="SELECT * FROM cartoon,product where cartoon.product_id=product.product_id and cash_id='$cashID'";
  $query_run=mysqli_query($con,$query);
  $sum=0;
  $save=0;
  while($row1=mysqli_fetch_array($query_run)){
	     $id=$row1["product_id"]; 
		 $dis=$row1["discount"];
		 $quan= $row1["quaS"];
		 $mrp=$row1["mrp"];
		 $tot=($mrp-(($dis/100)*$mrp))*$quan;
		 $sum=$sum+$tot;
		 $save=$save+$quan*$mrp;
	?>
      <tr>
	    <td><?php echo $row1["prod_name"] ?></td>
		  <td><?php echo $row1["mrp"] ?></td>
		    <td><?php echo $row1["quaS"] ?></td>
		   <td><?php echo $row1["discount"]."%" ?></td>
		
		   <td><?php echo $tot ?></td>
		  	 	 
			 
       </tr>
<?php }
}
} ?>




    </tbody>
	<tfoot>
	
	</tfoot>
	
	
  </table>
  <h3>Total Savings : <i class="fa fa-inr"></i><?php echo $save-$sum ?></h3>
  <h3>Total Amount to pay : <i class="fa fa-inr"></i><?php echo $sum ?></h3>
   
   <div class="form-group pull-right">
         <input type="text" name="emma" id="email" placeholder="Enter Email" style="height: 30px;" >
			    <input type="hidden" name="bill" value="<?php echo ceil($sum) ?>" id="msg">
				<button   type="button" class="btn btn-danger" onclick="send();" >  <span class="glyphicon glyphicon-envelope"></span>&nbsp EMAIL_RECIPIENT</button>
	
</div>	
  