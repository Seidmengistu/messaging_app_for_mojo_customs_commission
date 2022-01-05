<?php 
session_start();
include "../../includes/config.php";

if(isset($_POST['pending']))
	{
            
            
            $conn=mysqli_connect('localhost','root','','mwa');
             $eid=$_POST['pending'];
            $response=trim($_POST['response']);
            $rdate=trim($_POST['rdate']);
            $rtime=trim($_POST['rtime']);
            $status=1;
           
         
          $sql="UPDATE  message SET Respose_For_The_Problem='$response',redate='$rdate',retime='$rtime',Status_5='$status' WHERE id='$eid' ";
       

          if(mysqli_query($conn,$sql))
          {

            $_SESSION['status']="Respone For The Problem Send Successfully!";
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


        if(isset($_GET['approved']))
	{
                $aeid=intval($_GET['approved']);
               
                $status=0;
                $sql =$dbh->prepare("UPDATE message SET Status_5=:status WHERE  id=:aeid");
                $sql -> bindParam(':status',$status, PDO::PARAM_STR);
                $sql-> bindParam(':aeid',$aeid, PDO::PARAM_STR);
                if($sql->execute()){
                    $_SESSION['status']="Problem Response Put in Not Seen State";
                    $_SESSION['status_code']="success";
                    header('Location:../managemessages/SeeMessages.php');
                    
                }
    }


?>