<!DOCTYPE html>
<html lang="en">
<head>
  <title>Lubombo Health Regional Leave System</title>
  <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="shortcut icon" href="Background/MoH-square.png" type="image/x-icon">
  <script src="bootstrap/js/bootstrap.min.js"></script>
   <link rel="stylesheet" type="text/css" href="CSS/userlogin.css">
  <style>

 body {
	background-image: url("Background/logo.png");
    background-repeat: no-repeat;
    background-size: 70%;
    background-position: 50% 20%;
    font-family: Agency FB;
}

</style>
</head>
<body>

<?php 

$uName="";
$Pass="";



$uNameERR="";
$UsereXIST="";
$PassERR1="";
$PassERR2="";



if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    function Valid($Information)
	{
		$Information=trim($Information);
		$Information=stripcslashes($Information);
		$Information=htmlspecialchars($Information);
		return $Information;
	}
	
     

	$error=0;
	if(empty($_POST['Employee']))
	{
		$error++;
		$uNameERR="Required";
	}
	else
	{
		$uName=Valid($_POST['Employee']);
	}
	
	
	if(empty($_POST['Pass']))
	{
		$error++;
		$PassERR1="Required, ";
	}
	else
	{
		$Pass=Valid($_POST['Pass']);
	}
	

	
	
	if($error==0)
	{
	
   

	     $Server="localhost";
		 $username="root";
		 $psrd="";
		 $dbname = "Office";
		 $connection= mysqli_connect($Server,$username,$psrd,$dbname);
		 
		 
		
	     $query="select * from Employee where Eusername='$uName' and Epassword='$Pass'";
		
		
		 
	    $Complete=mysqli_query($connection,$query) or die("unable to connect");
			   
		
		$Rows=mysqli_fetch_array($Complete);

		
		if($Rows['Eusername']==$uName &&$Rows['Epassword']==$Pass)
		{

				session_start();
		        $_SESSION['uName'] = $uName;
				$_SESSION['Pass'] = $Pass;
				

			   header("Location:EmployeeAccount.php");
		     exit();
		 
		}
		else
		{
		echo "<script>alert('Wrong User Name Or Password Try Again');</script>";
		}
		
			mysqli_close($connection);  			 			 		   
	 }
   
}
	

?>


<div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <div class="account-wall">
			   <h1 class="text-center login-title"><b>SIGN IN TO CONTINUE</b></h1>
                <img class="profile-img" src="Image/user.png " alt="">
                <form class="form-signin" action="" method="POST">
                <input type="text" class="form-control" name="Employee" placeholder="Enter Employee User Name" required autofocus>
                <input type="password" class="form-control" name="Pass" placeholder="Enter Your Password" required>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
               <label class="checkbox pull-left"> &nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp
                    <input type="checkbox" value="remember-me">Remember me
                </label>
                <a href="EmployeeForgot.php" class="pull-right need-help"><b>Forgot Password?</b></a><span class="clearfix"></span>
               </form>
                <a href="Home.php"> <img src="Image/back.jpg"  width="60px" height="60px"/> </a>
				<a href="EmployeeRegistration.php" class="text-center new-account"><h4><b><span style="color: black">Create an account</span></b></h4> </a>
            </div>            
        </div>
    </div>
</div>


</body>
</html>

