<?php 
session_start();
include "../../includes/config.php";
if(isset($_REQUEST['del']))
	{
                $did=intval($_GET['del']);
                $sql = $dbh->prepare("DELETE from complain WHERE  id=:did");
                $sql-> bindParam(':did',$did, PDO::PARAM_STR);
                if($sql->execute())
                {
                    $_SESSION['status']="Complain Deleted";
                    $_SESSION['status_code']="success";
                    header('Location:../complaint/SeeComplaint.php');

                }
    }
?>