<?php 
session_start();
include "../../includes/config.php";
if(isset($_GET['pending']))
	{
            $eid=$_GET['pending'];
            $status="1";
            $sql = $dbh->prepare("UPDATE users SET Status=:status WHERE  id=:eid");
            $sql -> bindParam(':status',$status, PDO::PARAM_STR);
            $sql-> bindParam(':eid',$eid, PDO::PARAM_STR);
            if($sql->execute())
            {
                $_SESSION['status']="Problem Solver User Approved Successfully";
                $_SESSION['status_code']="success";
                header('Location:../manageusers/ApproveProblemSolvers.php');
                
            }
    }

if(isset($_GET['approved']))
	{
                $aeid=intval($_GET['approved']);
                
                $status=0;
                $sql =$dbh->prepare("UPDATE users SET Status=:status WHERE  id=:aeid");
                $sql -> bindParam(':status',$status, PDO::PARAM_STR);
                $sql-> bindParam(':aeid',$aeid, PDO::PARAM_STR);
                if($sql->execute()){
                    $_SESSION['status']="Problem Solver User Put In Pending State Successfully";
                    $_SESSION['status_code']="success";
                    header('Location:../manageusers/ApproveProblemSolvers.php');
                    
                }
    }
if(isset($_REQUEST['del']))
	{
                $did=intval($_GET['del']);
                $sql = $dbh->prepare("DELETE from users WHERE  id=:did");
                $sql-> bindParam(':did',$did, PDO::PARAM_STR);
                if($sql->execute())
                {
                    $_SESSION['status']="Problem Solver User Deleted";
                    $_SESSION['status_code']="success";
                    header('Location:../manageusers/ApproveProblemSolvers.php');

                }
    }
?>