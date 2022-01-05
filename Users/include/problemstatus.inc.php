<?php 
session_start();
include "../../includes/config.php";
if(isset($_GET['pending']))
	{
        $eid=$_GET['pending'];
    
    $sql ="SELECT *  FROM message WHERE id=:eid  ";
    
    $query= $dbh -> prepare($sql);
    $query -> bindParam(':eid',$eid, PDO::PARAM_STR);
    $query-> execute();
    $results = $query->fetchAll(PDO::FETCH_ASSOC);
   $cc=$query->rowCount() > 0;
foreach ($results as $res) 
{
            $Status_3= $res['Status_3']; 
            $solver=$res['Solver'];
            $id=$res['id'];
                                                        
}
        if($Status_3==0 && $id==$eid){
          $_SESSION['status']="  The Message Status Must Be In Seen State By ".$solver." Before You Put It In Solved State";
          $_SESSION['status_code']="error";
           
            header('Location:../managemessages/SeeMessages.php');
        }  
       
        else{
            $status=1;
            $sql = $dbh->prepare("UPDATE message SET Status_2=:status WHERE  id=:eid");
            $sql -> bindParam(':status',$status, PDO::PARAM_STR);
            $sql-> bindParam(':eid',$eid, PDO::PARAM_STR);
            if($sql->execute())
            {
                $_SESSION['status']="Problem  Solved Successfully";
                $_SESSION['status_code']="success";
                header('Location:../managemessages/SeeMessages.php');
                
            }
    }
    }
if(isset($_GET['approved']))
	{
                $aeid=intval($_GET['approved']);
                
                $status=0;
                $sql =$dbh->prepare("UPDATE message SET Status_2=:status WHERE  id=:aeid");
                $sql -> bindParam(':status',$status, PDO::PARAM_STR);
                $sql-> bindParam(':aeid',$aeid, PDO::PARAM_STR);
                if($sql->execute()){
                    $_SESSION['status']="Problem Not Solved ";
                    $_SESSION['status_code']="success";
                    header('Location:../managemessages/SeeMessages.php');
                    
                }
    }

?>