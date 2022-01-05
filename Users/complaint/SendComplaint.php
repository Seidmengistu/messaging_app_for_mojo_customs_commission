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
  include ('../include/sidebar.inc.php');
  ?>
  <div class="content-wrapper" style="background-image:url('../../includes/images/bg-01.jpg')">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card" style="background-image:url('../../includes/images/bg-01.jpg')">

                                    <div class="card-body">


                                        <form action='../include/SendMessage.inc.php' method='POST'>
                                            <div class="mb-3">
                                                <label class="form-label">Sender Name</label>

                                                <?php
                                                 $username=$_SESSION['username']; 
                                                $conn=mysqli_connect('localhost','root','','mwa');
                                                $sql = $conn->query("SELECT Full_Name FROM users WHERE Status=1 && User_Name='$username' ") or die(mysqli_error());
                                                while($row = $sql->fetch_array())
                                                {                                                                                                                                                           
                                            ?>
                                                <input readonly name='Sender_Name' class="form-control"
                                                    value="<?php echo $row['Full_Name']?>">
                                                <?php
                                                            }
                                                            ?>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Select Recipant Name</label>
                                                <select class="form-control" name="Recipant_Name" id="Recipant_Name"
                                                    required>

                                                    <option required>
                                                        <?php 
                                                                $username=$_SESSION['username']; 
                                                                $conn=mysqli_connect('localhost','root','','mwa');
                                                                $sql = $conn->query("SELECT Full_Name FROM `users` WHERE Status=1 && Role='Admin'  ORDER BY `Full_Name`") or die(mysqli_error());
                                                                while($row = $sql->fetch_array()){
                                                            ?>
                                                    <option value="<?php echo $row['Full_Name']?>">
                                                        <?php echo $row['Full_Name']?>
                                                    </option>
                                                    <?php
                                                            }
                                                            ?>
                                                </select>
                                            </div>
                                        <div class="mb-3">
                                            <label class="form-label">Complain</label>
                                            <textarea required name="complain" class='form-control'></textarea>
                                           
                                        </div>
                                        <?php $mydate=new DateTime(); ?>
                                        <div class="mb-3">
                                            <label class="form-label">Date</label>
                                            <input readonly class="form-control" type="Date" name='date'
                                                value="<?php echo $mydate->format('Y-m-d');?>">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Time</label>
                                            <input readonly class="form-control" type="Time" name='time'
                                                value="<?php $mytime=date('h:i'); echo $mytime?>">
                                        </div>
                                        

                                        <input type="hidden" class="form-control" name='id'>

                                        <a href='SeeComplaint.php' class='btn btn-danger'>Cancel</a>
                                        <button name='Send' class='btn btn-primary'>Send</button>
                                        </form>
                                    </div>
                                    <!-- /.card-body -->
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
