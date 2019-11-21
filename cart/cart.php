<?php 
 session_start();
 if((isset($_SESSION["cashID"])!=true)||  empty($_SESSION["cashID"]))
    {header("Location:index.php");
      exit();}

 $cashID=$_SESSION["cashID"];
 
?>


<div class="row">
<div class="col-md-6">
<h3>ProductsSelected</h3>
</div>
<div class="col-md-6">
 <button type="button" class="btn btn-warning   pull-right" onclick="empty();" id="empty" ><span class="glyphicon glyphicon-shopping-cart"></span>Empty_Cart </button>
</div>
 </div>
 
 <table class="table table-striped table-bordered">
    <thead>
      <tr>
        <th>Name</th>
        <th>Unit_Price</th>
		<th>Quantity</th>
        <th>Discount</th>
		
		<th>Remove</th>
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
   
  while($row1=mysqli_fetch_array($query_run)){
	     $id=$row1["product_id"]; 
	?>
      <tr>
	    <td><?php echo $row1["prod_name"] ?></td>
		  <td><?php echo $row1["mrp"] ?></td>
		   <td><?php echo $row1["quaS"] ?></td>
		    <td><?php echo $row1["discount"]."%" ?></td>
			    
			 
			 <td>
			  
			  <button   type="button" class="btn btn-danger" onclick="remove('<?php echo $id ?>')" id="remove"> <span class="glyphicon glyphicon-remove"></span></button>
			  
			  </td>
       </tr>
<?php }
}
} ?>
    </tbody>
  </table>
  