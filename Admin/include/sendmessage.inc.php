<?php 
session_start();
include "../../includes/config.php";

if(isset($_POST['notsend']))
	{
    $eid=$_POST['notsend'];
    
    $sql ="SELECT *  FROM message WHERE id=:eid  ";
    
    $query= $dbh -> prepare($sql);
    $query -> bindParam(':eid',$eid, PDO::PARAM_STR);
    $query-> execute();
    $results = $query->fetchAll(PDO::FETCH_ASSOC);
   $cc=$query->rowCount() > 0;
foreach ($results as $res) 
{
            $Status_6= $res['Status_6']; 
            $id=$res['id'];
                                                        
}
  
        if($Status_6==0 && $id==$eid){
          $_SESSION['status']=" Please Put  The Message Status In Seen State Before You send";
          $_SESSION['status_code']="error";
           
            header('Location:../managemessages/SeeMessages.php');
        }  
       
        else{
            $conn=mysqli_connect('localhost','root','','mwa');
             $eid=$_POST['notsend'];
            $solver=trim($_POST['solver']);
            $rdate=trim($_POST['rdate']);
            $rtime=trim($_POST['rtime']);
            $status=1;
            // $counter=0;

        $sql="UPDATE  message SET Solver='$solver',Rdate='$rdate',Rtime='$rtime',Status_3='$status' WHERE id='$eid' ";
          if(mysqli_query($conn,$sql))
          {
            // $cc=$counter+1;
            // // var_dump($counter);
            // // die();
            // $sqll="UPDATE  message SET Counter='$cc' WHERE id='$eid' ";
            // mysqli_query($conn,$sqll);
            $_SESSION['status']=" Problem Send To  ".$solver."  Successfully!";
            $_SESSION['status_code']="success";
            header('Location:../managemessages/SeeMessages.php');
            
          }
          else 
          {
            $_SESSION['status']="Respond Not Send";
            $_SESSION['status_code']="error";
            header('Location:../managemessages/SeeMessages.php');

          }
        }
        }
        if(isset($_GET['send']))
        {
                      $aeid=intval($_GET['send']);
                      // var_dump($aeid);
                      // die();
                      $status=0;
                      $sql =$dbh->prepare("UPDATE message SET Status_3=:status WHERE  id=:aeid");
                      $sql -> bindParam(':status',$status, PDO::PARAM_STR);
                      $sql-> bindParam(':aeid',$aeid, PDO::PARAM_STR);
                      if($sql->execute()){
                          $_SESSION['status']="Problem Response Put in Not  send State";
                          $_SESSION['status_code']="success";
                          header('Location:../managemessages/SeeMessages.php');
                          
                      }
          }


?>