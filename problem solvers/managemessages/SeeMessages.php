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
                                    <span class="fas fa-user"></span>

                                    See Messages From Users
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
                                            <th>Solver</th>
                                            <th>Response</th>
                                            <th>Response Date</th>
                                            <th>Response Time</th>
                                            <th>Message Status To User</th>
                                            <th>Problem Status From User </th>
                                            

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
                                        $sql = "SELECT * from message  WHERE  Solver=:app && Status_3=1  ";
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
                                                <?php if($result->Status_5==0)
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
                                                    <?php if($result->Status_2==0)
                                           {?>
                                                    <button class="btn btn-warning btn-sm" data-toggle="modal"
                                                        data-target="#pendingg" data-id="<?=$result->id?>">
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
                                                    data-target="#approvedd" data-id="<?=$result->id?>">

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




                         <div class="modal fade" id="pending" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 style="color:blue" class="modal-title" id="exampleModalLabel">Sending
                                            Response To The Problem With Solution
                                        </h5>
                                        <button type="button" class="btn-close" data-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>                           
                                        <form action="../include/problemresponse.inc.php" method="POST">
                                     <div class="modal-body">                                      
                                        <div class="mb-3">
                                            <label class="form-label">Response For The Problem</label>
                                            <textarea class="form-control" name="response" id="" required placeholder="Write Brief Solution For The Problem"></textarea>
                                        
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Date</label>
                                            <input readonly type="date" class="form-control" name='rdate' Value="<?php $mydate=new DateTime(); echo $mydate->format('Y-m-d')?>" diabled>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Time</label>
                                            <input readonly type="time" class="form-control" name='rtime' required value="<?php $mytime=date('h:i:s'); echo $mytime?>"  diabled>
                                        </div>

                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                        <button type='submit' class='btn btn-success' name='pending'>Send</button>
                                            <input type='hidden' name='pending' value="" id="pendingId">
                                        </div>

                                     </div>
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
                                            <form action="../include/problemresponse.inc.php" method="GET">
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
   

    $('#pending').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        document.getElementById('pendingId').value = button.data('id');
    });

    $('#approved').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        document.getElementById('approvedId').value = button.data('id');
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