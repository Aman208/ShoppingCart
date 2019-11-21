<?php 
session_start();

if((isset($_SESSION["cashID"])!=true)||  empty($_SESSION["cashID"]))
    {header("Location:index.php");
      exit();}


?>



<!DOCTYPE html>
<html lang="en">
<head>
  <title>SHOPPING CART</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- BOOTSTRAP CORE STYLE  -->
  <link rel="icon" href="cart.png" type="image/png">
    <!-- DATATABLE STYLE  -->
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
	
  <link rel="icon" href="jsr1.png" type="image/png">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <!--script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script-->
  <!--script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script-->
  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
  <!--link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"-->
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

</head>
<style>
html, body {margin: 0; height: 100%; overflow-x: hidden}
</style>

<body>
<div class="row">
<div class="col-md-1" style="margin-right:0px;">

<button  role ="button" class="btn btn-info"><?php echo $_SESSION["name"]?></button>
</div>
<div class="col-md-1" style="margin-right:0px;">
<a href="logout.php" class="btn btn-danger">LOGOUT</a>
</div>
</div>
<div class="container" style="margin-bottom:30px;">

<div class="row">
<div class="col-md-3">

<h2>BY Name</h2>

<form action="" method="GET" autocomplete ="off"> 
  <div class="row">
    <div class="col-xs-12 col-md-12">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="name" name="pro_name"  required />
        <div class="input-group-btn">
          <button class="btn btn-primary" type="submit" name="nam">
            <span class="glyphicon glyphicon-search"></span>
          </button>
        </div>
      </div>
    </div>
  </div>
</form>
</div>
<div class="col-md-3">
<h2>BY Prod_Id</h2>

<form action="" method="GET" autocomplete ="off"> 
  <div class="row">
    <div class="col-xs-12 col-md-12">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="pro_id" name="pro_id" required />
        <div class="input-group-btn">
          <button class="btn btn-primary" type="submit" name="pro">
            <span class="glyphicon glyphicon-search"></span>
          </button>
        </div>
      </div>
    </div>
  </div>
</form>
</div>
<div class="col-md-3">
<h2>BY Category</h2>

<form action="" method="GET"> 
  <div class="row">
    <div class="col-xs-12 col-md-12">
      <div class="input-group">
	  
	  
	  
	  
	  <select name="cat_id" autocomplete ="off" class="form-control" required>	  
                 <option value="" disabled selected>select</option>
	  
	<?php  

 $con=mysqli_connect("localhost","root","","cart");

	$query = "SELECT * FROM category";
//echo $query;
$query_run=mysqli_query($con,$query);
    
         while($row=mysqli_fetch_array($query_run))
		   {
              ?>                    
	   
         
      <option value="<?php echo $row['cat_id']?>" > <?php echo $row['cat_name']?> </option>
      
		   <?php } ?>
    </select>
	  
	  
	  
	  
	  
	  
	  
	  
	  
        <div class="input-group-btn">
          <button class="btn btn-primary" type="submit" name="cat">
            <span class="glyphicon glyphicon-search"></span>
          </button>
        </div>
      </div>
    </div>
  </div>
</form>
</div>
<div class="col-md-3">
<h2>BY Brand</h2>

<form action="" method="GET"> 
  <div class="row">
    <div class="col-xs-12 col-md-12">
      <div class="input-group">
          <select name="bra_id" autocomplete ="off" class="form-control" required>	  
          <option value=""  disabled selected>Select</option>
	  
	<?php  

 $con=mysqli_connect("localhost","root","","cart");

	$query = "SELECT DISTINCT brand_name,brand_id FROM brand";
//echo $query;
$query_run=mysqli_query($con,$query);
    
         while($row=mysqli_fetch_array($query_run))
		   {
              ?>                    
	   

      <option value="<?php echo $row['brand_id']?>" > <?php echo $row['brand_name']?> </option>
      
		   <?php } ?>
    </select>
	  
        <div class="input-group-btn">
          <button class="btn btn-primary" type="submit" name="bra">
            <span class="glyphicon glyphicon-search"></span>
          </button>
        </div>
      </div>
    </div>
  </div>
</form>
</div>

</div>



</div>





    
  
  
  
  
  
            <div class="row">
                <div class="col-md-8">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                          <h4>Product Details</h4>
                        </div>
                        <div class="panel-body">
                          
							<div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover"id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                          
                                            <th>Prod_Name</th>
                                           
                                            <th>Prod_ID</th>
											<th>Category</th>
											<th>Brand</th>
										    <th>Status</th>
											<th>Quantity</th>
											 
                                           
                                        </tr>
                                    </thead>
   
                                 <tbody>

                                   
                                      
										
										<?php 
										
									$con=mysqli_connect("localhost","root","","cart");
if($con)
{  if(isset($_GET["nam"]))
	{$name=strtoupper($_GET["pro_name"]);
    // echo $name;
     $query="SELECT quantity,product_id,prod_name,cat_name,category.cat_id,brand.brand_name from product,category,brand where product.cat_id=category.cat_id and brand.brand_id=product.brand_id and category.cat_id=brand.cat_id and prod_name like('%$name%')";
	 $query_run=mysqli_query($con,$query); 
	 //echo $query;
	}
	
   else if(isset($_GET["pro"])){
      	  $id=$_GET["pro_id"];
		 $query="SELECT quantity,product_id,prod_name,cat_name,category.cat_id,brand.brand_name from product,category,brand where product.cat_id=category.cat_id and brand.brand_id=product.brand_id and category.cat_id=brand.cat_id and product.product_id='$id'";
      $query_run=mysqli_query($con,$query);}
   else if(isset($_GET["cat"])){
     	    $cat=$_GET["cat_id"];
		 $query="SELECT  quantity,product_id,prod_name,cat_name,category.cat_id,brand.brand_name from product,category,brand where product.cat_id=category.cat_id and brand.brand_id=product.brand_id and category.cat_id=brand.cat_id and product.cat_id='$cat'";
      $query_run=mysqli_query($con,$query);}

    else if(isset($_GET["bra"])){
     	    $brand=$_GET["bra_id"];
		 $query="SELECT * from product,category,brand where product.cat_id=category.cat_id and product.brand_id='$brand' and brand.brand_id='$brand' and brand.cat_id=product.cat_id";
         $query_run=mysqli_query($con,$query);}
	  
	  
	 if(mysqli_num_rows($query_run)<=0) 
	      {echo "<script>alert('PRODUCT NOT AVAILABLE');</script>";
	      
          exit();}
		  
		   $cnt=1;
	  while($row=mysqli_fetch_array($query_run))
	  {
	   ?>
	   
	   
	  	  
	  	
										
										
										
										
										
										  <tr class="odd gradeX">
										
										
                                            <td class="center"><?php echo $cnt;?></td>
                                            <td class="center"><?php echo $row["prod_name"] ;?></td>
                                            <td class="center"><?php echo $row["product_id"]; ?></td>
											<td class="center"><?php echo $row["cat_name"]; ?></td>
                                            <td class="center"><?php echo $row["brand_name"]; ?></td>
                                        <?php if($row["quantity"]==0)
										      $qr="OUT_OF_STOCK";
										      else
											 $qr="Available";?>			
										    <td class="center"><?php echo $qr; ?></td>
                                              <td class="center form-froup" >
											  <?php $id=$row['product_id'];
									            if($qr=="Available"){
											  ?> 
											    <form class="foo">
											     <input type="number"  name="quantity" class="num"  min="1"  max="<?php echo $row['quantity'] ?>" autocomplete ="off" placeholder="<?php echo $row['quantity'] ?>" required >
												 <input type="hidden" name="id" value="<?php echo $id ?>" >
												
												 <button type="submit" name="sub"  class="btn btn-danger"><span class="glyphicon glyphicon-shopping-cart"></span>Add_To_Cart</button>
												<!--button   type="button" class="btn btn-danger" onclick="add('<?php //echo $id ?>')" id="clk"> <span class="glyphicon glyphicon-plus"></span>ADD</button-->
												 </form>
											    <?php  } ?>
											  
											  </td>
                                          


											<?php 
		                                    
											$cnt=$cnt+1;
		   
											 ?>


                                    </tr>	

                                <?php }
}
?>


    									
                                    </tbody>
							
                                </table>


                             
						   </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
              
		   </div>
		


 <div  style="margin-right:25px;max-height-400px;postion" id="mod">
<!--modal----------------->

 <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal" onclick="mod();">&nbsp <i class="fa fa-inr"></i>
            TOTAL BILL
        </button>
        
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">TOTAL BILL</h4>
              </div>
              <div class="modal-body">
               
				
				
              </div>
              <div class="modal-footer">
             

              			  
			   <button type="button" class="btn btn-warning" data-dismiss="modal"  style="margin-right:250px;">Close</button>
                
				
				
              </div>
            </div>
          </div>
        </div>
 </div> 


 <div  class="col-md-4 pull-right" style="overflow: scroll;width:32%;margin-right:10px;max-height:700px;" id="fill">

  


</div>



</div>


</body>
</html>

 
 
 

 
 
 
 
 
 
 
  <script>
     $(function () {
    $('.foo').on('submit', function (e) {
        $.ajax({
            type: 'post',
            url: 'insert.php',
            data: $(this).serialize(),
            success: function () {
               display();
            }
        });
        e.preventDefault();
    
	
	
	
	});
});
    </script>
 
 
 
 
   
	
	
	
	
	
	
	
	<script>
	
	
	$(document).ready(function(){
		display();
		
	});
	
	
	
	
	
	
	
	 
		function add(id){
			var num=$().val();
			$.ajax({
			     url: "insert.php",
				 type: "POST",
				 data: {id:id},
				 success: function(data,status){
				       display();
				   
				 }
			
			
			
			
			});
		 
		};
		
	function display(){
		var record="record";
		$.ajax({
		  url:"cart.php",
		  type:"POST",
		  data:{record:record},
		  success:function(data){
			
			  $("#fill").html(data);
		  }
		
		
		});
		
		
	}		
		
		
	function remove(id){
			//var id=$(this).val();
			$.ajax({
			     url: "remove.php",
				 type: "POST",
				 data: {id:id},
				 success: function(data,status){
				       display();
				   
				 }
			
			
			
			
			});
		 
		};
			
		function empty(){
		var record1="record1";
		$.ajax({
		  url:"delete.php",
		  type:"POST",
		  data:{record1:record1},
		  success:function(data){
			display();
		  }
		
		
		});
		
		
	}			
		
		







function mod(){
		var record="record";
		$.ajax({
		  url:"modal.php",
		  type:"POST",
		  data:{record:record},
		  success:function(data){
			  $(".modal-body").html(data);
		  }
		
		
		});
		
		
	}		
		
function send(){
		var email=$("#email").val();
		var msg=$("#msg").val();
	    if(email!=""){
		$.ajax({
		  url:"email.php",
		  type:"POST",
		  data:{email:email,msg:msg},
		  success:function(data){
			  alert("Email sent successfully");
			  update();
			  
		  }
		
		
		});
		
		
	}	

}

function update(){
		var record3="record3";
		$.ajax({
		  url:"update.php",
		  type:"POST",
		  data:{record3:record3},
		  success:function(data){
			empty();
			display();
		  }
		
		
		});
		
		
	}		



	
	
</script>	
	
	
	
	

           <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY  -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
    <!-- DATATABLE SCRIPTS  -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>
           
 