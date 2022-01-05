<?php
session_start();
include "../includes/config.php";
if(!isset($_SESSION['logged_in'])) {
    
    header('location:../login.php');
} 
include "../Auth/middleware.php";

    isAdmin();

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>MWA</title>
  
  <meta name="viewport" content="width=device-width, initial-scale=1">

<?php
include('include/outercss.inc.php');
?>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <?php 
  include('../load.php');
  include ('include/homenavbar.inc.php');
  include ('include/homesidebar.inc.php');
  ?>
   <!-- Content Wrapper. Contains page content -->
   <div class="content-wrapper" style="background-image:url('../includes/images/bg-01.jpg')">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">

                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">


                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div>
            </div>

            <div class="content">
                <div class="container-fluid">
                <?php
                                                $username=$_SESSION['username']; 
                                                 
                                                $conn=mysqli_connect('localhost','root','','mwa');
                                                $sql = $conn->query("SELECT Full_Name FROM users WHERE status=1 && User_Name='$username' ") or die(mysqli_error());
                                                while($row = $sql->fetch_array())
                                                {  
                                                                                                                                                                                                             
                                            ?>   
                    <h3 style="text-align:center">WelCome <?php 
                     echo $row['Full_Name'] ?></h3>

                    <?php
                 }?>
                </div>
                <!-- /.row -->
            </div>
        </div>
    </div> <!-- Main Footer -->
  <?php 
  include('include/footer.inc.php');
  ?>
  <aside class="control-sidebar control-sidebar-dark">
    
  </aside>
</div>
<?php include('include/scriptt.inc.php');?>
</body>
</html>
