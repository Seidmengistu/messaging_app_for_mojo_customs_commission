<?php
session_start();
include('../../includes/config.php');    
if(isset($_POST['Send']))
  {  
$Sender_Name=$_POST['Sender_Name'];
$Recipant_Name=$_POST['Recipant_Name']; 
$complain=$_POST['complain'];
$date=$_POST['date'];
$time=$_POST['time'];
$status=0;

$sql="INSERT INTO  complain(Sender_Name,Recipant_Name,Complaint,date,time,status)

                   VALUES(:Sender_Name,:Recipant_Name,:complain,:date,:time,:status)";

$query = $dbh->prepare($sql);
$query->bindParam(':Sender_Name',$Sender_Name,PDO::PARAM_STR);
$query->bindParam(':Recipant_Name',$Recipant_Name,PDO::PARAM_STR);
$query->bindParam(':complain',$complain,PDO::PARAM_STR);
$query->bindParam(':date',$date,PDO::PARAM_STR);
$query->bindParam(':time',$time,PDO::PARAM_STR);
$query->bindParam(':status',$status,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();

if($lastInsertId)
{
  $_SESSION['status']="Complain Send Successfully To ".$Recipant_Name;
  $_SESSION['status_code']="success";
   header('Location:../complaint/SendComplaint.php');

}
else 
{
  $_SESSION['status']="Some Problem";
  $_SESSION['status_code']="error";
   header('Location:../signup.php');
}
}

?>