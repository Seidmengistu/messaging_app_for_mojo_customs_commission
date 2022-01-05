<?php
session_start();
include('../includes/config.php');
 
if(isset($_POST['login']))
{
                            $UserName=$_POST['username'];
                            $Password=md5($_POST['password']);
                            
                            $sql ="SELECT *  FROM users WHERE User_Name=:UserName and Password=:Password";
                            $query= $dbh -> prepare($sql);
                            $query-> bindParam(':UserName', $UserName, PDO::PARAM_STR);
                            $query-> bindParam(':Password', $Password, PDO::PARAM_STR);
                            $query-> execute();
                            $results = $query->fetchAll(PDO::FETCH_ASSOC);
                           $cc=$query->rowCount() > 0;
                     foreach ($results as $res) 
                     {
                                             $Role= $res['Role'];                                            
                                             $username=$res['User_Name'];
                                             $Password=$res["Password"];
                                             $status= $res['Status']; 
                                                               
                     }

                 if($cc>0)
                  { 
                      
                     if($status==FALSE)
                     {
                                 $_SESSION['status']="Not Approved!Contact Your  Admin";
                                 $_SESSION['status_code']="warning";
                                 header('Location:../login.php');
                                 exit();        
                     } 
                     
                  switch ($Role) 
                  {    
                        case 'Admin':       
                                    $_SESSION['logged_in'] = true;
                                    header('location:../Admin/Adminhome.php');
                                    $_SESSION['Role'] = 'Admin';
                                    $_SESSION['username'] = $_POST['username']; 
                                    break;
                        case "Problem_Solvers":
                                    $_SESSION['logged_in'] = true;
                                    header('Location:../problem solvers/problemsolvershome.php');
                                    $_SESSION['Role'] = 'Problem_Solvers';  
                                    $_SESSION['username'] = $_POST['username']; 
                                    break;
                        case "Users":
                                    $_SESSION['logged_in'] = true;
                                    header('Location:../Users/usershome.php');
                                    $_SESSION['Role'] = 'Users';  
                                    $_SESSION['username'] = $_POST['username']; 
                                    break;
                        
                  }
            }
         else{
               $_SESSION['status']="Incorrect Username or Password";
               $_SESSION['status_code']="warning";
               header('Location:../login.php');
            }
 }
?>