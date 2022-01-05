<?php
session_start();
include('../includes/config.php');    
if(isset($_POST['signup']))
  {   
    $username=trim($_POST['username']);
    $fullname=trim($_POST['fullname']);
    $password=$_POST['password'];
    $confirmpassword=$_POST['confirmpassword'];
    $date=$_POST['date'];
    $sendto=$_POST['sendto'];
    $role=$_POST['role'];
    // $question=$_POST['question'];
    // $answer=$_POST['answer'];
    $status=0;
  
    
    
    if($password!=$confirmpassword)
        {
            // var_dump($password);
            // var_dump($confirmpassword);
            // die();
                $_SESSION['status']="Password And Confirm Password Not Mached";
                $_SESSION['status_code']="warning";
                header('Location:../signup.php');
                exit();
        }

    if(is_numeric($fullname)){
        $_SESSION['status']="Full Name Must Be Alphabet";
      $_SESSION['status_code']="warning";
      header('Location:../signup.php');
    }
    else{
    $password=md5($_POST['password']);
    $sql ="SELECT User_Name FROM users";
    $query= $dbh -> prepare($sql);
    $query-> bindParam(':User_Name', $User_Name, PDO::PARAM_STR);
    $query-> execute();
    $results = $query->fetchAll(PDO::FETCH_ASSOC);

    foreach ($results as $res) {
      $user=$res["User_Name"];
    }

    if($user==$username)
    {   
      $_SESSION['status']="Person with this Username Already Registered!";
      $_SESSION['status_code']="warning";
      header('Location:../signup.php');
      exit();
    }

    $sql="INSERT INTO  users (Full_Name,User_Name,Password,Role,Aprovement_To,Date,status)
                      VALUES(:fullname,:username,:password,:role,:sendto,:date,:status)";
    $query = $dbh->prepare($sql);
    $query->bindparam(':fullname',$fullname,PDO::PARAM_STR);
    $query->bindParam(':username',$username,PDO::PARAM_STR);
    $query->bindParam(':password',$password,PDO::PARAM_STR);
    $query->bindParam(':role',$role,PDO::PARAM_STR);
    $query->bindParam(':date',$date,PDO::PARAM_STR);
    $query->bindParam(':sendto',$sendto,PDO::PARAM_STR);
    // $query->bindParam(':question',$question,PDO::PARAM_STR);
    // $query->bindParam(':answer',$answer,PDO::PARAM_STR);
    $query->bindParam(':status',$status,PDO::PARAM_STR);
    $query->execute();
    $lastInsertId = $dbh->lastInsertId();

    if($lastInsertId)
    {
      $_SESSION['status']="Sign up Successfully!  Wait for Aprrovement From   ". $sendto;
      $_SESSION['status_code']="success";
      header('Location:../signup.php');

    }
    else 
    {
      $_SESSION['status']="Some Problem";
      $_SESSION['status_code']="error";
      header('Location:../signup.php');
    }
    }
}
?>