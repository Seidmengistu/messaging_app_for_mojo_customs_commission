<?php
session_start();
include "../../includes/config.php";
if(!isset($_SESSION['logged_in'])) {
    
    header('location:../../login.php');
} 
include "../../Auth/middleware.php";

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
  include('../include/css.inc.php');
  ?>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <?php 
  include('../../load.php');
  include ('../include/navbar.inc.php'); 
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

                                     Approvement Information
                                </h3>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                            </div>
                            <div class="content">

                                <div class="container-fluid">

                                    <div class="row">
                                        <div class="col-lg-3 col-6">
                                            <div style="align:center" class="small-box bg-info">
                                                <div class="inner">
                                                    <?php
                                                    
                                                    $query=$dbh->prepare("SELECT id From users WHERE status=1 && Role='Users'&& Aprovement_To='Desta'  ORDER BY id");
                                                    $query->execute();
                                                    $row=$query->rowCount();
                                                    echo '<h1>'.$row.'</h1>';

                                                    ?>
                                                    <p style="color:blue">Approved Users</p>
                                                </div>
                                                <div class="icon">
                                                    <i class="ion ion-bag"></i>
                                                </div>
                                                <a href="ApproveUsers.php" class="small-box-footer">More info <i
                                                        class="fas fa-arrow-circle-right"></i></a>
                                            </div>
                                        </div>

                                        <div class="col-lg-3 col-6">
                                            <div class="small-box bg-warning">
                                                <div class="inner">
                                                    <?php
                                    
                                        $query=$dbh->prepare("SELECT id From users WHERE status=0 && Role='Users' ORDER BY id");
                                         $query->execute();
                                        $row=$query->rowCount();
                                        echo '<h1>'.$row.'</h1>';

                                        ?>

                                                    <p  style="color:red">Pending Users</p>
                                                </div>
                                                <div class="icon">
                                                    <i class="ion ion-person-add"></i>
                                                </div>
                                                <a href="ApproveUsers.php"  class="small-box-footer">More info <i
                                                        class="fas fa-arrow-circle-right"></i></a>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-6">
                                            <div style="align:center" class="small-box bg-info">
                                                <div class="inner">
                                                    <?php
                                                    
                                                    $query=$dbh->prepare("SELECT id From users WHERE status=1 && Role='Problem_Solvers'&& Aprovement_To='Desta'  ORDER BY id");
                                                    $query->execute();
                                                    $row=$query->rowCount();
                                                    echo '<h1>'.$row.'</h1>';

                                                    ?>
                                                    <p style="color:blue">Approved Problem Solvers</p>
                                                </div>
                                                <div class="icon">
                                                    <i class="ion ion-bag"></i>
                                                </div>
                                                <a href="ApproveProblemSolvers.php" class="small-box-footer">More info <i
                                                        class="fas fa-arrow-circle-right"></i></a>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-6">
                                            <div class="small-box bg-warning">
                                                <div class="inner">
                                                    <?php
                                    
                                        $query=$dbh->prepare("SELECT id From users WHERE status=0 && Role='Problem_Solvers' ORDER BY id");
                                         $query->execute();
                                        $row=$query->rowCount();
                                        echo '<h1>'.$row.'</h1>';

                                        ?>

                                                    <p  style="color:red">Pending Problem Solvers</p>
                                                </div>
                                                <div class="icon">
                                                    <i class="ion ion-person-add"></i>
                                                </div>
                                                <a href="ApproveProblemSolvers.php"  class="small-box-footer">More info <i
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
    </div> <!-- Main Footer -->
  <?php 
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
