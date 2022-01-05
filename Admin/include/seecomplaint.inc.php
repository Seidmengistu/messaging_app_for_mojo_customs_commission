<?php 
session_start();
include "../../includes/config.php";
if(isset($_GET['pending']))
	{
            $eid=$_GET['pending'];
            $status="1";
            $sql = $dbh->prepare("UPDATE complain SET status=:status WHERE  id=:eid");
            $sql -> bindParam(':status',$status, PDO::PARAM_STR);
            $sql-> bindParam(':eid',$eid, PDO::PARAM_STR);
            if($sql->execute())
            {
                $_SESSION['status']="Complaint Seen Successfully";
                $_SESSION['status_code']="success";
                header('Location:../complaint/SeeComplaint.php');
                
            }
    }

if(isset($_GET['approved']))
	{
                $aeid=intval($_GET['approved']);
                
                $status=0;
                $sql =$dbh->prepare("UPDATE complain SET Status=:status WHERE  id=:aeid");
                $sql -> bindParam(':status',$status, PDO::PARAM_STR);
                $sql-> bindParam(':aeid',$aeid, PDO::PARAM_STR);
                if($sql->execute()){
                    $_SESSION['status']="Complaint Not Seen";
                    $_SESSION['status_code']="success";
                    header('Location:../complaint/SeeComplaint.php');
                    
                }
    }

?>