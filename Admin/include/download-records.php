<?php
session_start();
include "../../includes/config.php";
if(!isset($_SESSION['logged_in'])) {
    header('location:../login.php');
    
 

}

	else{?>
	 <?php 
$query=$dbh->prepare("SELECT id From message WHERE Status_4=1   ORDER BY id");                                  
 $query->execute();                                                                      
 $row=$query->rowCount();

 $que=$dbh->prepare("SELECT id From message WHERE Status_4=0   ORDER BY id");                                  
 $que->execute();                                                                      
 $roww=$que->rowCount();
 $seen=$dbh->prepare("SELECT id From message WHERE Status_1=1   ORDER BY id");                                  
 $seen->execute();                                                                      
 $seenrow=$seen->rowCount();

 $seen=$dbh->prepare("SELECT id From message WHERE Status_1=0   ORDER BY id");                                  
 $seen->execute();                                                                      
 $unseenrow=$seen->rowCount();									                                                              
echo nl2br ("TOTAL SOLVED PROBLEMS  " .$row);
echo nl2br ("\n");

echo nl2br("TOTAL UN SOLVED PROBLEMS  " .$roww);
echo nl2br ("\n");
echo nl2br ("TOTAL Seen PROBLEMS From User " .$seenrow);
echo nl2br ("\n");

echo nl2br("TOTAL UN Seen PROBLEMS From User " .$unseenrow);
?>
<table border="1">
									<thead>
										<tr>
										    <th>#</th>
                                            <th>Sender Name</th>
                                            <th>Recipant Name</th>
											<th>Section</th>
											<th>Floor</th>
											<th>Room Number</th>
											<th>Problem Type</th>
											<th>Problem Explanation</th>
											<th>Recived Date</th>
											<th>Recived Time</th>
											<th>Problem Solver</th>
											<th>Problem Response</th>
											<th>Problem Send Date </th>
											<th>Problem Send Time </th>
											<th>Problem Status</th>
										
										</tr>
									</thead>

<?php 
$filename="Message list";
$username=$_SESSION['username'];
$sql = "SELECT * from  message";
$query = $dbh -> prepare($sql);
$query-> bindParam(':username', $username, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;

if($query->rowCount() > 0)
{
	foreach($results as $result)
	{	
		
		if($result->Status_4==0)	
		$result->Status_4='Not Solved';
		else	
		$result->Status_4='Solved';	
		// $time=$result->rtime;
		// // var_dump($time);
		// // die();		
echo ' 

<tr>  
        <td>'.$cnt.'</td> 
        <td>'.$Sender_Name= $result->Fromm.'</td> 
        <td>'.$Recipant_Name= $result->Too.'</td> 
		<td>'.$Section= $result->Section.'</td> 
        <td>'.$floor= $result->Floor.'</td> 
        <td>'.$room_nu= $result->Room_No.'</td> 
        <td>'.$problemtype= $result->Problem_Type.'</td> 
        <td>'.$problemexplan= $result->Problem_Explanation.'</td> 
        <td>'.$imporrdate= $result->Rdate.'</td> 
        <td>'.$rtme=$result->Rtime.'</td>	
        <td>'.$solver=$result->Solver.'</td>	 
        <td>'.$response=$result->Respose_For_The_Problem.'</td>	
        <td>'.$redatee=$result->redate.'</td>	
        <td>'.$retimee=$result->retime.'</td>	
        <td>'.$Status=$result->Status_4.'</td> 
	

       

</tr>  
';
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=".$filename."-Admin.xls");
header("Pragma: no-cache");
header("Expires: 0");
			$cnt++;
			}
	}
?>
</table>
<?php } ?>