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
body, html {
  
  overflow-y:auto;
   background-image: url("cash2.jpg");

  /* Full height */
  height: 100%; 
  margin:0px;

  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}
</style>





<?php 

session_start();

if((isset($_SESSION["cashID"])==true)||!empty($_SESSION["cashID"]))
    {header("Location:product.php");
      exit();}
$con=mysqli_connect("localhost","root","","cart");
if($con)	  
{if(isset($_POST["adminsub"]))
   { if ($_POST["vercode"] != $_SESSION["vercode"] OR $_SESSION["vercode"]=='')  {
        echo "<script>alert('Incorrect verification code');</script>" ;
        } 
        else {
			$name=$_POST["name"];
			$pass=$_POST["password"];
			$query="SELECT * FROM cashier WHERE name='$name' AND password='$pass'";
			//echo $query;
			$query_run=mysqli_query($con,$query);
			if(mysqli_num_rows($query_run)==1)
			  {while($row=mysqli_fetch_array($query_run))
				  {$_SESSION["cashID"]=$row["cash_id"];
			       $_SESSION["name"]=$row["name"]; 
			       
			  }
			       
			       header("Location:product.php");
			  }
			else
              echo "<script>alert('Please fill correct details')</script>";				
			  
		   }
   }
  
}
	
?>
<body>
<div class="container" style="width:30%; height:40%;margin-top:100px;margin-left:385px; box-shadow:14px 8px 18px 10px #eee;background-color:#73debf6e;">
<h2 class="text-center" style="color:#f7e70c;">Cashier Login</h2>
<form  method="POST"  action="" style="color:#f7e70c;">
    <div class="form-group">
    <label for="uname">UserName</label>
    <input type="text" class="form-control" id="uname" name="name"  placeholder="Enter UserName" autocomplete ="off" required>
    </div>
  <div class="form-group">
    <label for="pass">Password</label>
    <input type="password" class="form-control" id="pass" name="password"   placeholder="Enter Password" autocomplete ="off" required>
  </div>
   <div class="form-group">
<label>Verification code : </label>
<input type="text"  name="vercode" maxlength="5" autocomplete="off" required style="width: 150px; height: 25px; color:black;" />&nbsp;<img src="captcha.php">
</div>  
<input type="submit" name="adminsub" class="btn btn-primary btn-md" value="LOG IN">
</form>
</div>
</body>
</html>












