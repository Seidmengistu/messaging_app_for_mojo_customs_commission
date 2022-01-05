<?php
session_start();
include('../../includes/config.php');


     
if(isset($_POST['send']))
  {
    // Fromm	Too	Floor	Room_No	Problem_Type	Problem_Explanation	Date	Time
$from=$_POST['from'];
$too=trim($_POST['too']);
$section=trim($_POST['section']);
$floor=trim($_POST['floor']);
$room=$_POST['room'];
$problem=trim($_POST['problem']);
$problemexp=$_POST['problemexp'];
$date=$_POST['date'];
$time=$_POST['time'];
$Status_1=0;


 
$sql="INSERT INTO message(Fromm,Too,Floor,Section,Room_No,Problem_Type,Problem_Explanation,Date,Time,Status_1)
                       VALUES(:from,:too,:floor,:section,:room,:problem,:problemexp,:date,:time,:Status_1)";
$query = $dbh->prepare($sql);
$query->bindParam(':from',$from,PDO::PARAM_STR);
$query->bindParam(':too',$too,PDO::PARAM_STR);
$query->bindParam(':section',$section,PDO::PARAM_STR);
$query->bindParam(':floor',$floor,PDO::PARAM_STR);
$query->bindParam(':room',$room,PDO::PARAM_STR);
$query->bindParam(':problem',$problem,PDO::PARAM_STR);
$query->bindParam(':problemexp',$problemexp,PDO::PARAM_STR);
$query->bindParam(':date',$date,PDO::PARAM_STR);
$query->bindParam(':time',$time,PDO::PARAM_STR);
$query->bindParam(':Status_1',$Status_1,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();

if($lastInsertId)
{
  $_SESSION['status']="Message Send Successfully!Wait Response ";
  $_SESSION['status_code']="success";
   header('Location:../managemessages/SendMessages.php');

}
else 
{
  
  $_SESSION['status']="Message Not Send";
  $_SESSION['status_code']="error";
   header('Location:../Addmaterials.php');
}
}
// }
?>