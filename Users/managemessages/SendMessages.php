<?php
session_start();
include "../../includes/config.php";
if(!isset($_SESSION['logged_in'])) {
    
    header('location:../../login.php');
} 
include "../../Auth/middleware.php";

    isuser();

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>MWA</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php
  include('../include/css.inc.php');
  ?>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <?php 
        include ('../include/load.php');
  include ('../include/navbar.inc.php');
  ?>
        <?php 
  include ('../include/sidebar.inc.php');
  ?>
        <div class="content-wrapper">
            <section class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-info">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="nav-icon fas fa-copy"></i>

                                    Send Messages
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
                <br>

                <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#stu">
                    Send Messages
                </button>

                <?php
                
       $username=$_SESSION['username']; 
    //    var_dump($username);
    //    die();
        $conn=mysqli_connect('localhost','root','','mwa');
         $sql = $conn->query("SELECT Full_Name FROM users WHERE User_Name='$username'  ") or die(mysqli_error());                                               
         while($row = $sql->fetch_array())
         {  
            
           $app=$row['Full_Name'];   
            //    var_dump($app);
            //  die();                                                                                                                                                
          } 
          
            ?>
                <div class="modal fade" id="stu" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"
                                    style="color:green;font-family:new times roman">
                                    Send Messages
                                </h5>
                                <button type="button" class="btn-close" data-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>

                            <div class="modal-body" style="background-image:url('../../includes/images/bg-01.jpg')">

                                <form action='../include/SendMessages.inc.php' enctype="multipart/form-data"
                                    method='POST'>
                                    
                                        <?=include "../include/SendMessageForm.inc.php";?>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary" name='send'>Send</button>
                                        </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
        </div>
        <?php 
  include('../include/notify.php');
  include('../include/footer.inc.php');
  ?>
        <aside class="control-sidebar control-sidebar-dark">
        </aside>
    </div>
    <?php
include('../include/script.inc.php');
?>
</body>

</html>