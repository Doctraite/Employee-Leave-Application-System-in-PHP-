<?php


if(isset($_GET['Reject']))
{

     $name=$_GET['Reject'];

     $Server="localhost";
     $username="root";
     $psrd="";
     $dbname = "Office";
     $connection= mysqli_connect($Server,$username,$psrd,$dbname); 

         $query="insert into LeaveStatus(UserName,Status,Seen) values('$name','Rejected','No')";
         mysqli_query($connection,$query);

         header('Location:LeaveRequest.php');
}
?>