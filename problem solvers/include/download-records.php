<?php
session_start();
include "../../includes/config.php";
if(!isset($_SESSION['logged_in'])) {
    header('location:../login.php');
    
 

}

	else{?>
	 
	 <?php 
	 
	 $filename="Message list ";

$username=$_SESSION['username'];                                    
$conn=mysqli_connect('localhost','root','','mwa');
$sql = $conn->query("SELECT * FROM users WHERE User_Name='$username' ") or die(mysqli_error());                                               
while($row = $sql->fetch_array())
{  
$app=$row['Full_Name'];                                                                                                                                                       
}
echo "These Are the Reports  By ".$app;

$query=$dbh->prepare("SELECT id From message WHERE Status_1=1 &&  Solver=:app ORDER BY id");
$query->bindparam(':app',$app,PDO::PARAM_STR);
$query->execute();
$row=$query->rowCount();

 $que=$dbh->prepare("SELECT id From message WHERE Status_1=0  &&  Solver=:app  ORDER BY id"); 
 $que->bindparam(':app',$app,PDO::PARAM_STR);                                 
 $que->execute();                                                                      
 $roww=$que->rowCount();

 $seen=$dbh->prepare("SELECT id From message WHERE Status_2=1  &&  Solver=:app  ORDER BY id");
 $seen->bindparam(':app',$app,PDO::PARAM_STR);                                  
 $seen->execute();                                                                      
 $seenrow=$seen->rowCount();
 
 $seen=$dbh->prepare("SELECT id From message WHERE Status_2=0  &&  Solver=:app  ORDER BY id");
 $seen->bindparam(':app',$app,PDO::PARAM_STR);                                  
 $seen->execute();                                                                      
 $unseenrow=$seen->rowCount();	
 
echo nl2br ("\n");
echo nl2br ("TOTAL SOLVED PROBLEMS  " .$seenrow);
echo nl2br ("\n");
echo nl2br("TOTAL UN SOLVED PROBLEMS  " .$unseenrow);
echo nl2br ("\n");
echo nl2br ("TOTAL Seen PROBLEMS From User " .$row);
echo nl2br ("\n");
echo nl2br("TOTAL UN Seen PROBLEMS From User " .$row);






header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=".$filename."-from solver.xls");
header("Pragma: no-cache");
header("Expires: 0");
			
			}
	
?>
