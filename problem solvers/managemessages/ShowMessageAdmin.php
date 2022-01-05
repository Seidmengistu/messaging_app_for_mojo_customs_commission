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
                                    <span class="fas fa-user"></span>

                                    See Messages From Admin
                                </h3>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                            </div>
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Sender Name</th>
                                            <!-- <th>Recipent Name</th> -->
                                            <th>Floor</th>
                                            <th>Room Num</th>
                                            <th>Problem Type</th>
                                            <th>Problem Explanation</th>
                                            <th>Date</th>
                                            <th>Time</th>
                                            <th>Problem Solver</th>
                                            <th>Response</th>
                                            <th>Response Date</th>
                                            <th>Response Time</th>
                                            <th>Message Status To Admin</th>
                                            <th>Problem Status To Admin</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $username=$_SESSION['username']; 
                                       
                                        $conn=mysqli_connect('localhost','root','','mwa');
                                        $sql = $conn->query("SELECT * FROM users WHERE User_Name='$username' ") or die(mysqli_error());                                               
                                        while($row = $sql->fetch_array())
                                        {  
                                        $app=$row['Full_Name'];
                                        // var_dump($app);
                                        // die();                                                                                                                                                       
                                        }                                                              
                                        $sql = "SELECT * from message  WHERE  Solver=:app && Status_3=1 ";
                                        $query = $dbh -> prepare($sql);
                                        $query->bindparam(':app',$app,PDO::PARAM_STR);
                                        $query->execute();
                                        $results=$query->fetchAll(PDO::FETCH_OBJ);
                                        $cnt=1;
                                        if($query->rowCount() > 0)
                                      {
                                         foreach($results as $result)
                                         {			                               
                                            ?>
                                        <tr>
                                            <td><?php echo htmlentities($cnt);?></td>
                                            <td><?php echo htmlentities($result->Fromm);?></td>
                                            <!-- <td><?php echo htmlentities($result->Too);?></td> -->
                                            <td><?php echo htmlentities($result->Floor);?></td>
                                            <td><?php echo htmlentities($result->Room_No);?></td>
                                            <td><?php echo htmlentities($result->Problem_Type);?></td>
                                            <td><?php echo htmlentities($result->Problem_Explanation);?></td>
                                            <td><?php echo htmlentities($result->Date);?></td>
                                            <td><?php echo htmlentities($result->Time);?></td>
                                            <td><?php echo htmlentities($result->Solver);?></td>
                                            <td><?php echo htmlentities($result->Respose_For_The_Problem);?></td>
                                            <td><?php echo htmlentities($result->redate);?></td>
                                            <td><?php echo htmlentities($result->retime);?></td>


                                            <td>
                                                <?php if($result->Status_1==0)
                                           {?>
                                                <button class="btn btn-warning btn-sm" data-toggle="modal"
                                                    data-target="#pending" data-id="<?=$result->id?>">
                                                    <i class="fas fa-pencil-alt">
                                                    </i>
                                                    Not Seen
                                                    </a>
                                            </td>
                                            <?php 
                                           } 
                                           else
                                           {?>
                                            <button class="btn btn-info btn-sm" data-toggle="modal"
                                                data-target="#approved" data-id="<?=$result->id?>">

                                                <i class="fas fa-pencil-alt">
                                                </i>
                                                Seen
                                                </a>
                                                <?php
                                             }
                                              ?>
                                                <td>
                                                    <?php if($result->Status_4==0)
                                           {?>
                                                    <button class="btn btn-warning btn-sm" data-toggle="modal"
                                                        data-target="#notsolved" data-id="<?=$result->id?>">
                                                        <i class="fas fa-pencil-alt">
                                                        </i>
                                                        Not solved
                                                        </a>
                                                </td>
                                                <?php 
                                           } 
                                           else
                                           {?>
                                                <button class="btn btn-info btn-sm" data-toggle="modal"
                                                    data-target="#solved" data-id="<?=$result->id?>">

                                                    <i class="fas fa-pencil-alt">
                                                    </i>
                                                    Solved
                                                    </a>
                                                    <?php
                                             }
                                              ?>
                                                    </td>
                                        </tr>
                                        <?php 
                                            $cnt=$cnt+1; 
                                          }
                                        
                                        } ?>
                                    </tbody>
                                </table>
                            </div>


                            <div class="modal fade" id="notsolved">
                                <div class="modal-dialog">
                                    <div class="modal-content bg-warning">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Information
                                            </h5>
                                            <button type="button" class="btn-close" data-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <h5>Is The Problem Solved?</h5>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger"
                                                data-dismiss="modal">NO</button>
                                            <form action="../include/problemstatus.inc.php" method="GET">
                                                <button type='submit' class='btn btn-success'
                                                    name='notsolved'>Yes</button>
                                                <input type='hidden' name='notsolved' value="" id="notsolvedid">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal fade" id="solved">
                                <div class="modal-dialog">
                                    <div class="modal-content bg-warning">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Information
                                            </h5>
                                            <button type="button" class="btn-close" data-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <h5>Is The Probem Not Solved?</h5>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger"
                                                data-dismiss="modal">NO</button>
                                            <form action="../include/problemstatus.inc.php" method="GET">
                                                <button type='submit' class='btn btn-success'
                                                    name='solved'>Yes</button>
                                                <input type='hidden' name='solved' value="" id="solvedid">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal fade" id="pending">
                                <div class="modal-dialog">
                                    <div class="modal-content bg-warning">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Information
                                            </h5>
                                            <button type="button" class="btn-close" data-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <h5>Message Will Be Put In Seen State?</h5>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger"
                                                data-dismiss="modal">NO</button>
                                            <form action="../include/problemstatus.inc.php" method="GET">
                                                <button type='submit' class='btn btn-success'
                                                    name='pending'>Yes</button>
                                                <input type='hidden' name='pending' value="" id="pendingId">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal fade" id="approved">
                                <div class="modal-dialog">
                                    <div class="modal-content bg-warning">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Information
                                            </h5>
                                            <button type="button" class="btn-close" data-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <h5>Message Will Be Put In Not Seen State?</h5>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger"
                                                data-dismiss="modal">NO</button>
                                            <form action="../include/problemstatus.inc.php" method="GET">
                                                <button type='submit' class='btn btn-success'
                                                    name='approved'>Yes</button>
                                                <input type='hidden' name='approved' value="" id="approvedId">
                                            </form>
                                        </div>
                                    </div>
                                </div>
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
   <script>
    $('#abc').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        document.getElementById('deleteId').value = button.data('id');
    });

    $('#pending').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        document.getElementById('pendingId').value = button.data('id');
    });

    $('#approved').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        document.getElementById('approvedId').value = button.data('id');
    });
    $('#notsolved').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        document.getElementById('notsolvedid').value = button.data('id');
    });

    $('#solved').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        document.getElementById('solvedid').value = button.data('id');
    });

    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });

    $(document).ready(function () {
    
        
}), $(".theme-loader").fadeOut("slow", function () {
    $(this).remove()
})
    </script>
</body>

</html>