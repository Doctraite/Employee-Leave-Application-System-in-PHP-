
<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Lubombo Health Regional Leave System</title>
  <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="shortcut icon" href="Background/MoH-square.png" type="image/x-icon">
  <script src="bootstrap/js/bootstrap.min.js"></script>

  <style>

 body {
  
    font-family: Agency FB;
    background-image: url("Background/logo.png");
    background-repeat: no-repeat;
    background-size: 60%;
    background-position: 50% 20%;
}

</style>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Health Regional Leave Management System</a>
    </div>
       <ul class="nav navbar-nav">
      <li  class="active"><a href="EmployeeAccount.php"><b>&nbsp&nbsp&nbsp&nbsp Home</b></a></li>
      <li><a href="EmployeeUpdate.php"><b>Update Profile</b></a></li>
      <li><a href="LeaveApplication.php"><b>Leave Application</b></a></li>
      <li><a href="LeaveStatus.php"><b>View Leave Status</b></a></li>
      <li><a href="RemainDays.php"><b>Remain Days</b></a></li>
    </ul>
  
	
   <ul class="nav navbar-nav navbar-right">
 
      <li><a href="EmpLogout.php"><span class="glyphicon glyphicon-user"></span> <b>Logout</b></a></li>
      
    </ul>
  </div>
</nav>

<style>


.bg-text {
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0, 0.4); /* Black w/opacity/see-through */
  border-radius: 25px;
  color: white;
  font-weight: bold;
  border: 3px solid #f1f1f1;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  z-index: 2;
  width: 30%;
  padding: 20px;
  text-align: center;
}

</style>


<div class="bg-text">

  <?php
     error_reporting(0);
    $DATABASE="localhost";
     $username="root";
     $psrd="";
     $dbname = "Office";
     $connection= mysqli_connect($DATABASE,$username,$psrd,$dbname);
    
    $uname= $_SESSION['uName'];
     $query="select * from Employee where Eusername='$uname'";
      $Result=mysqli_query($connection,$query);
        
        $row = mysqli_fetch_array($Result);

        echo "<div align='center'>";
          echo "<img style='margin:2% auto auto 2%;float:center;border:3px solid white;border-radius:20px;width:300px;height:360px' src='".$row['Ephoto']."'>";
         echo "</div>";
              echo "<div align='center'>";
              echo "<h1 style'margin:2% auto auto 40%;float:right;' >";
              echo $row['Ename'];
              echo "<br>";
              echo $row['Eemail'];
              echo "<br>";
              echo "</div>";
           
         echo"</div>";   

?>
</div>

</body>
</html>

