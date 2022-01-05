<?php
session_start();
include('../../includes/config.php');    
if(isset($_POST['change']))
  {   
    $username=trim($_POST['username']);
    $password=md5($_POST['password']);
    $confirmpassword=md5($_POST['confirmpassword']);
    
    
    if($password!=$confirmpassword)
        {
            // var_dump($password);
            // var_dump($confirmpassword);
            // die();
                $_SESSION['status']="Password And Confirm Password Not Mached";
                $_SESSION['status_code']="warning";
                header('Location:showprofile.php');
                exit();
        }

  else{
        $username=$_SESSION['username'];
        // var_dump($username);
        // die();
       
        $sql="UPDATE users SET User_Name=:username,Password=:password WHERE User_Name=:username";
        $query = $dbh->prepare($sql);
        $query->bindParam(':username',$username,PDO::PARAM_STR);
        $query->bindParam(':password',$password,PDO::PARAM_STR);
        // $query->bindParam(':department',$department,PDO::PARAM_STR);
        
        $query->execute();
        $lastInsertId = $dbh->lastInsertId();
     
        if(!$lastInsertId)
        {
        $_SESSION['status']="Update Profile Information Successfully";
        $_SESSION['status_code']="success";
        header('Location:showprofile.php');

        }
        else 
        {
        $_SESSION['status']="Some Problem";
        $_SESSION['status_code']="error";
        header('Location:showprofile.php');
        }
    }
   }
  
?>