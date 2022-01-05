<?php 
session_start();
include "../../includes/config.php";

if(isset($_POST['pending']))
	{
    // var_dump(67);
    // die();

            
            $conn=mysqli_connect('localhost','root','','mwa');
             $eid=$_POST['pending'];
          
            $status=1;
           
                // var_dump($conn);
                // die();

          $sql="UPDATE  message SET Status_6='$status' WHERE id='$eid' ";
        //  var_dump($sql);
        //  die();
          if(mysqli_query($conn,$sql))
          {

            $_SESSION['status']="Message Put In Seen State Successfully!";
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
        if(isset($_POST['approved']))
        {
          // var_dump(67);
          // die();
      
                  
                  $conn=mysqli_connect('localhost','root','','mwa');
                   $aeid=$_POST['approved'];
                
                  $status=0;
                 
                      // var_dump($conn);
                      // die();
      
                $sql="UPDATE  message SET Status_6='$status' WHERE id='$aeid' ";
              //  var_dump($sql);
              //  die();
                if(mysqli_query($conn,$sql))
                {
      
                  $_SESSION['status']="Message Put In Not Seen State Successfully!";
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

?>