<?php
session_start();
include "../../includes/config.php";
if(!isset($_SESSION['logged_in'])) {
    
    header('location:../../login.php');
} 
include "../../Auth/middleware.php";

    isproblemsolver();

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>MWA</title>
  
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../../includes/csss/style.css">
  <?php
  include('../include/css.inc.php');
  
  ?>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
<?php
  include ('../include/load.php');
  ?>

  <?php 
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
                                    <i class="nav-icon fas fa-history"></i>

                                     Message Information
                                </h3>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                            </div> 
                             <div class="card-body">
                                <a href="../include/download-records.php" style="color:green; font-size:16px">Download
                                    Message List(xlsx)</a>
                            </div>
                            <div class="content">

                                <div class="container-fluid">

                                    <div class="row">
                                  
                                        <div class="col-lg-3 col-6">
                                            <div style="text-align:center" class="small-box bg-info">
                                                <div class="inner">
                                                <?php
                                                    
                                                    $username=$_SESSION['username'];                                    
                                                    $conn=mysqli_connect('localhost','root','','mwa');
                                                    $sql = $conn->query("SELECT * FROM users WHERE User_Name='$username' ") or die(mysqli_error());                                               
                                                    while($row = $sql->fetch_array())
                                                    {  
                                                    $app=$row['Full_Name'];                                                                                                                                                       
                                                    }
                                                    $query=$dbh->prepare("SELECT id From message WHERE Status_1=1 &&  Solver=:app ORDER BY id");
                                                    $query->bindparam(':app',$app,PDO::PARAM_STR);
                                                    $query->execute();
                                                    $row=$query->rowCount();
                                                    echo '<h3>'.$row.'</h3>';

                                                ?>
                                                    <p style="color:blue">Seen Messages</p>
                                                </div>
                                                <div class="icon">
                                                    <i class="ion ion-bag"></i>
                                                </div>
                                                <a href="SeeMessages.php" class="small-box-footer">More info <i
                                                        class="fas fa-arrow-circle-right"></i></a>
                                            </div>
                                        </div>

                                        <div style="text-align:center" class="col-lg-3 col-6">
                                            <div class="small-box bg-warning">
                                                <div class="inner">
                                                                <?php
                                                    
                                                                    $username=$_SESSION['username'];                          
                                                                    $conn=mysqli_connect('localhost','root','','mwa');
                                                                    $sql = $conn->query("SELECT * FROM users WHERE User_Name='$username' ") or die(mysqli_error());                                               
                                                                    while($row = $sql->fetch_array())
                                                                    {  
                                                                    $app=$row['Full_Name'];                                                                                                                                                                                                         
                                                                    }
                                                                    $query=$dbh->prepare("SELECT id From message WHERE Status_1=0 &&  Solver=:app ORDER BY id");
                                                                    $query->bindparam(':app',$app,PDO::PARAM_STR);
                                                                    $query->execute();
                                                                    $row=$query->rowCount();
                                                                    echo '<h3>'.$row.'</h3>';
                
                                                                ?>

                                                    <p  style="color:red">Not Seen Messages</p>
                                                </div>
                                                <div class="icon">
                                                    <i class="ion ion-person-add"></i>
                                                </div>
                                                <a href="SeeMessages.php"  class="small-box-footer">More info <i
                                                        class="fas fa-arrow-circle-right"></i></a>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-6">
                                            <div style="text-align:center" class="small-box bg-info">
                                                <div class="inner">
                                                            <?php
                                                    
                                                                    $username=$_SESSION['username'];                                                                     
                                                                    $conn=mysqli_connect('localhost','root','','mwa');
                                                                    $sql = $conn->query("SELECT * FROM users WHERE User_Name='$username' ") or die(mysqli_error());                                               
                                                                    while($row = $sql->fetch_array())
                                                                    {  
                                                                    $app=$row['Full_Name'];                                                                                                                                                                                                        
                                                                    }
                                                                    $query=$dbh->prepare("SELECT id From message WHERE Status_2=1 &&  Solver=:app ORDER BY id");
                                                                    $query->bindparam(':app',$app,PDO::PARAM_STR);
                                                                    $query->execute();
                                                                    $row=$query->rowCount();
                                                                    echo '<h1>'.$row.'</h1>';
                
                                                             ?>
                                                    <p style="color:blue">Solved Problems</p>
                                                </div>
                                                <div class="icon">
                                                    <i class="ion ion-bag"></i>
                                                </div>
                                                <a href="SeeMessages.php" class="small-box-footer">More info <i
                                                        class="fas fa-arrow-circle-right"></i></a>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-6">
                                            <div style="text-align:center" class="small-box bg-warning">
                                                <div class="inner">
                                                                <?php
                                                    
                                                                    $username=$_SESSION['username'];                                                                    
                                                                    $conn=mysqli_connect('localhost','root','','mwa');
                                                                    $sql = $conn->query("SELECT * FROM users WHERE User_Name='$username' ") or die(mysqli_error());                                               
                                                                    while($row = $sql->fetch_array())
                                                                    {  
                                                                    $app=$row['Full_Name'];                                                                                                                                                                                                                      
                                                                    }
                                                                    $query=$dbh->prepare("SELECT id From message WHERE Status_2=0 &&  Solver=:app ORDER BY id");
                                                                    $query->bindparam(':app',$app,PDO::PARAM_STR);
                                                                    $query->execute();
                                                                    $row=$query->rowCount();
                                                                    echo '<h1>'.$row.'</h1>';
                
                                                                ?>

                                                    <p  style="color:red">Not Solved Problems</p>
                                                </div>
                                                <div class="icon">
                                                    <i class="ion ion-person-add"></i>
                                                </div>
                                                <a href="SeeMessages.php"  class="small-box-footer">More info <i
                                                        class="fas fa-arrow-circle-right"></i></a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <aside class="control-sidebar control-sidebar-dark">

                                </aside>

                            </div>
                            <?php require_once('../include/notify.php')?>
                        </div>
                    </div>
                </div>
        </div>
    </div> 
  <aside class="control-sidebar control-sidebar-dark">
  </aside>
</div>
  <?php 
  include('../include/footer.inc.php');
  ?>
  <aside class="control-sidebar control-sidebar-dark">
  </aside>
</div>
<?php
include('../include/script.inc.php');
?>
<script>
$(document).ready(function () {
    $(".searchh-close").on("click", function () {
        $(".main-searchh .form-control").animate({
            width: "0"
        }), setTimeout(function () {
            $(".main-searchh").removeClass("open")
        }, )
    })
}), $(document).ready(function () {
    
        
    }), $(".theme-loader").fadeOut("slow", function () {
        $(this).remove()
    })
    </script>
</body>
</html>
