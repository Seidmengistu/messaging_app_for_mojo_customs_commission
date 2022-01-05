<?php 
session_start();
include "../../includes/config.php";
if(isset($_GET['pending']))
	{
        
            $eid=$_GET['pending'];
            $status=1;
            // var_dump($eid);
            // die();
            $sql = $dbh->prepare("UPDATE message SET Status_1=:status WHERE  id=:eid");
            $sql -> bindParam(':status',$status, PDO::PARAM_STR);
            $sql-> bindParam(':eid',$eid, PDO::PARAM_STR);
            if($sql->execute())
            {
                $_SESSION['status']="Message  Seen";
                $_SESSION['status_code']="success";
                header('Location:../managemessages/ShowMessageAdmin.php');
                
            }
    }

if(isset($_GET['approved']))
	{
                $aeid=intval($_GET['approved']);
                
                $status=0;
                $sql =$dbh->prepare("UPDATE message SET Status_1=:status WHERE  id=:aeid");
                $sql -> bindParam(':status',$status, PDO::PARAM_STR);
                $sql-> bindParam(':aeid',$aeid, PDO::PARAM_STR);
                if($sql->execute()){
                    $_SESSION['status']="Message Not Seen ";
                    $_SESSION['status_code']="success";
                    header('Location:../managemessages/ShowMessageAdmin.php');
                    
                }
    }
    if(isset($_GET['notsolved']))
	{
        $eid=$_GET['notsolved'];
       
        $sql ="SELECT *  FROM message WHERE id=:eid  ";
        
        $query= $dbh -> prepare($sql);
        $query -> bindParam(':eid',$eid, PDO::PARAM_STR);
        $query-> execute();
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
       $cc=$query->rowCount() > 0;
    foreach ($results as $res) 
    {
                $Status_1= $res['Status_1']; 
                $Status_2= $res['Status_2']; 
                $id=$res['id'];
                $from=$res['Fromm'];
                                                            
    }
    
      
            if($Status_1==0 && $id==$eid){
              $_SESSION['status']=" Please Put  The Message Status In Seen State Before You Solve";
              $_SESSION['status_code']="error";
               
                header('Location:../managemessages/ShowMessageAdmin.php');
            } 
            elseif($Status_2==0 && $id==$eid){
                $_SESSION['status']=" The Message Must Be in Solved State By The User ".$from;
                $_SESSION['status_code']="error";
                 
                  header('Location:../managemessages/ShowMessageAdmin.php');
            }
            else{
            $status=1;
            $sql = $dbh->prepare("UPDATE message SET Status_4=:status WHERE  id=:eid && Status_2=1");
            $sql -> bindParam(':status',$status, PDO::PARAM_STR);
            
            $sql-> bindParam(':eid',$eid, PDO::PARAM_STR);
            if($sql->execute())
            {
                $_SESSION['status']="Problem Solved State";
                $_SESSION['status_code']="success";
                header('Location:../managemessages/ShowMessageAdmin.php');
                
            }
    }
}

if(isset($_GET['solved']))
	{
        
                $aeid=intval($_GET['solved']);
                
                $status=0;
                $sql =$dbh->prepare("UPDATE message SET Status_4=:status WHERE  id=:aeid");
                $sql -> bindParam(':status',$status, PDO::PARAM_STR);
                $sql-> bindParam(':aeid',$aeid, PDO::PARAM_STR);
                if($sql->execute()){
                    $_SESSION['status']="Problem Not Solved State ";
                    $_SESSION['status_code']="success";
                    header('Location:../managemessages/ShowMessageAdmin.php');
                    
                }
    }

?>